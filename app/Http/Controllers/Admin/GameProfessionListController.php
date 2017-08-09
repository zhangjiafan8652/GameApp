<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\GameProfession;
use App\Http\Model\SysUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once 'resources\org\Code.class.php';

class GameProfessionListController extends CommonController
{
    //
    public function index()
    {
    //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gameprofession\' and table_schema=\'gameapp\'');
        $userdata= GameProfession::paginate(20);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata,
            'datasceshi'=>'nihao');
       //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
      //  dd($tabledatas['datas'][0]->$k);
       // $users=GameProfession ::paginate(5);
       return view('admin.GameProfessionlist')->with('tabledatas',$tabledatas);
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
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gameprofession\' and table_schema=\'gameapp\'');
        //使用id查找到当前值
        if ($id==0){
            $tabledatas=array('column_comment'=>$data,
                'data'=>'',
                'etc'=>$etc);

            return view('admin.GameProfessionnew')->with('tabledatas',$tabledatas);
        }else{
            $gameprofession= GameProfession::find($id);
            $tabledatas=array('column_comment'=>$data,
                'data'=>$gameprofession,
                'etc'=>$etc);
            return view('admin.GameProfessionedit')->with('tabledatas',$tabledatas);
        }

      //  dd($gameprofession);

    }

    //更新 参数id
    public function update()
    {
        //是实例化gameprofession
        $input=Input::all();
        $mgameprofession= GameProfession::find(next($input));
        foreach ($input as $key => $value){
            $mgameprofession->$key=$value;
        }
        $mgameprofession->save();
       // dd($mgameprofession);
    }


    //更新 参数id
    public function save()
    {

        //是实例化gameprofession
        $input=Input::all();
        $mgameprofession= new GameProfession();
        //通过时间函数获取唯一id
        $nowpriid=$this->getUUID();
        $mfgameprofession= GameProfession::find($nowpriid);
        if ($mfgameprofession!=null){
            return redirect('admin/GameProfessionedit?id=0&etc='.'请重新创建');
        }else{
            foreach ($input as $key => $value){
                $mgameprofession->$key=$value;
            }
            $mgameprofession->gameprofession_id=$nowpriid;
            $mgameprofession->save();
            return redirect('admin/gameprofession');
        }
    }

    public function datalist()
    {
        //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gameprofession\' and table_schema=\'gameapp\'');
        $userdata= GameProfession::paginate(4);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata);
        //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
         dd($tabledatas['datas']);
        // $users=GameProfession ::paginate(5);
        return view('admin.GameProfessionlist')->with('tabledatas',$tabledatas);
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
        Route::get('admin/gameprofession/ceshi', 'Admin\GameProfessionListController@datalist');
        Route::get('admin/gameprofession', 'Admin\GameProfessionListController@index');
        Route::get('admin/gameprofessionedit', 'Admin\GameProfessionListController@edit');
        Route::get('admin/gameprofessionupdate', 'Admin\GameProfessionListController@update');
        Route::get('admin/gameprofessionsave', 'Admin\GameProfessionListController@save');

    }


}
