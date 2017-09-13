<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\GameConfig;
use App\Http\Model\SysUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once 'resources\org\Code.class.php';

class GameConfigListController extends CommonController
{
    //
    public function index()
    {
    //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gameconfig\' and table_schema=\'gameapp\'');
        $userdata= GameConfig::paginate(20);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata,
            'datasceshi'=>'nihao');
       //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
      //  dd($tabledatas['datas'][0]->$k);
       // $users=GameConfig ::paginate(5);
       return view('admin.GameConfiglist')->with('tabledatas',$tabledatas);
    }

    public function edit()
    {
        $input=Input::all();
        $id=$input['id'];
        $etc=0;
        if (array_key_exists('etc',$input)){
           $etc=$input['etc'];
        }
        //获取列属性和名字
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gameconfig\' and table_schema=\'gameapp\'');
        //使用id查找到当前值
        if ($id==0){
            $tabledatas=array('column_comment'=>$data,
                'data'=>'',
                'etc'=>$etc);

            return view('admin.GameConfignew')->with('tabledatas',$tabledatas);
        }else{
            $gameconfig= GameConfig::find($id);
            $tabledatas=array('column_comment'=>$data,
                'data'=>$gameconfig,
                'etc'=>$etc);
            return view('admin.GameConfigedit')->with('tabledatas',$tabledatas);
        }

      //  dd($gameconfig);

    }

    //更新 参数id
    public function update()
    {
        //是实例化gameconfig
        $input=Input::all();
        $mgameconfig= GameConfig::find(next($input));
        foreach ($input as $key => $value){
            $mgameconfig->$key=$value;
        }
        $mgameconfig->save();
       // dd($mgameconfig);
    }


    //更新 参数id
    public function save()
    {

        //是实例化gameconfig
        $input=Input::all();
        $mgameconfig= new GameConfig();
        //通过时间函数获取唯一id
        $nowpriid=$this->getUUID();
        $mfgameconfig= GameConfig::find($nowpriid);
        if ($mfgameconfig!=null){
            return redirect('admin/GameConfigedit?id=0&etc='.'请重新创建');
        }else{
            foreach ($input as $key => $value){
                $mgameconfig->$key=$value;
            }
            $mgameconfig->gameconfig_id=$nowpriid;
            $mgameconfig->save();
            return redirect('admin/gameconfig');
        }
    }

    public function datalist()
    {
        //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gameconfig\' and table_schema=\'gameapp\'');
        $userdata= GameConfig::paginate(4);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata);
        //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
         dd($tabledatas['datas']);
        // $users=GameConfig ::paginate(5);
        return view('admin.GameConfiglist')->with('tabledatas',$tabledatas);
    }


    public function code()
    {
        $code=new \Code();
       return $code->make();

    }

    public function getcode()
    {
        echo "getcode";
    }

    public function routeurl()
    {
        //玩家信息
        Route::get('admin/gameconfig/ceshi', 'Admin\GameConfigListController@datalist');
        Route::get('admin/gameconfig', 'Admin\GameConfigListController@index');
        Route::get('admin/gameconfigedit', 'Admin\GameConfigListController@edit');
        Route::get('admin/gameconfigupdate', 'Admin\GameConfigListController@update');
        Route::get('admin/gameconfigsave', 'Admin\GameConfigListController@save');
    }


}
