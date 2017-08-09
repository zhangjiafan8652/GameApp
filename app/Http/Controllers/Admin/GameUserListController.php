<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\GameUser;
use App\Http\Model\SysUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once 'resources\org\Code.class.php';

class GameUserListController extends CommonController
{
    //
    public function index()
    {
    //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gameuser\' and table_schema=\'gameapp\'');
        $userdata= GameUser::paginate(20);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata,
            'datasceshi'=>'nihao');
       //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
      //  dd($tabledatas['datas'][0]->$k);
       // $users=GameUser ::paginate(5);
       return view('admin.GameUserlist')->with('tabledatas',$tabledatas);
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
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gameuser\' and table_schema=\'gameapp\'');
        //使用id查找到当前值
        if ($id==0){
            $tabledatas=array('column_comment'=>$data,
                'data'=>'',
                'etc'=>$etc);

            return view('admin.GameUsernew')->with('tabledatas',$tabledatas);
        }else{
            $gameuser= GameUser::find($id);
            $tabledatas=array('column_comment'=>$data,
                'data'=>$gameuser,
                'etc'=>$etc);
            return view('admin.GameUseredit')->with('tabledatas',$tabledatas);
        }

      //  dd($gameuser);

    }

    //更新 参数id
    public function update()
    {
        //是实例化gameuser
        $input=Input::all();
        $mgameuser= GameUser::find($input['gameuser_id']);
        foreach ($input as $key => $value){
            if (empty($value)){

            }else{
                $mgameuser->$key=$value;
            }
        }
        $mgameuser->save();
        return redirect('admin/gameuser');
       // dd($mgameuser);
    }


    //更新 参数id
    public function save()
    {

        //是实例化gameuser
        $input=Input::all();
        $mgameuser= new GameUser();
        //通过时间函数获取唯一id
        $nowpriid=$this->getUUID();
        $mfgameuser= GameUser::find($nowpriid);
        if ($mfgameuser!=null){
            return redirect('admin/GameUseredit?id=0&etc='.'请重新创建');
        }else{
            foreach ($input as $key => $value){
                $mgameuser->$key=$value;
            }
            $mgameuser->gameuser_id=$nowpriid;
            $mgameuser->save();
            return redirect('admin/gameuser');
        }
    }

    public function datalist()
    {
        //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gameuser\' and table_schema=\'gameapp\'');
        $userdata= GameUser::paginate(4);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata);
        //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
         dd($tabledatas['datas']);
        // $users=GameUser ::paginate(5);
        return view('admin.GameUserlist')->with('tabledatas',$tabledatas);
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
        Route::get('admin/gameuser/ceshi', 'Admin\GameUserListController@datalist');
        Route::get('admin/gameuser', 'Admin\GameUserListController@index');
        Route::get('admin/gameuseredit', 'Admin\GameUserListController@edit');
        Route::get('admin/gameuserupdate', 'Admin\GameUserListController@update');
        Route::get('admin/gameusersave', 'Admin\GameUserListController@save');
    }


}
