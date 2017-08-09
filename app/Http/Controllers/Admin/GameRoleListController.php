<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\GameRole;
use App\Http\Model\SysUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once 'resources\org\Code.class.php';

class GameRoleListController extends CommonController
{
    //
    public function index()
    {
    //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gamerole\' and table_schema=\'gameapp\'');
        $userdata= GameRole::paginate(20);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata,
            'datasceshi'=>'nihao');
       //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
      //  dd($tabledatas['datas'][0]->$k);
       // $users=GameRole ::paginate(5);
       return view('admin.GameRolelist')->with('tabledatas',$tabledatas);
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
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gamerole\' and table_schema=\'gameapp\'');
        //使用id查找到当前值
        if ($id==0){
            $tabledatas=array('column_comment'=>$data,
                'data'=>'',
                'etc'=>$etc);

            return view('admin.GameRolenew')->with('tabledatas',$tabledatas);
        }else{
            $gamerole= GameRole::find($id);
            $tabledatas=array('column_comment'=>$data,
                'data'=>$gamerole,
                'etc'=>$etc);
            return view('admin.GameRoleedit')->with('tabledatas',$tabledatas);
        }

      //  dd($gamerole);

    }

    //更新 参数id
    public function update()
    {
        //是实例化gamerole
        $input=Input::all();
        $mgamerole= GameRole::find(next($input));
        foreach ($input as $key => $value){
            $mgamerole->$key=$value;
        }
        $mgamerole->save();
       // dd($mgamerole);
    }


    //更新 参数id
    public function save()
    {

        //是实例化gamerole
        $input=Input::all();
        $mgamerole= new GameRole();
        //通过时间函数获取唯一id
        $nowpriid=$this->getUUID();
        $mfgamerole= GameRole::find($nowpriid);
        if ($mfgamerole!=null){
            return redirect('admin/GameRoleedit?id=0&etc='.'请重新创建');
        }else{
            foreach ($input as $key => $value){
                $mgamerole->$key=$value;
            }
            $mgamerole->gamerole_id=$nowpriid;
            $mgamerole->save();
            return redirect('admin/gamerole');
        }
    }

    public function datalist()
    {
        //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gamerole\' and table_schema=\'gameapp\'');
        $userdata= GameRole::paginate(4);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata);
        //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
         dd($tabledatas['datas']);
        // $users=GameRole ::paginate(5);
        return view('admin.GameRolelist')->with('tabledatas',$tabledatas);
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
        Route::get('admin/gamerole/ceshi', 'Admin\GameRoleListController@datalist');
        Route::get('admin/gamerole', 'Admin\GameRoleListController@index');
        Route::get('admin/gameroleedit', 'Admin\GameRoleListController@edit');
        Route::get('admin/gameroleupdate', 'Admin\GameRoleListController@update');
        Route::get('admin/gamerolesave', 'Admin\GameRoleListController@save');
    }


}
