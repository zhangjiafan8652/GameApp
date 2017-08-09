<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\GameMonster;
use App\Http\Model\SysUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once 'resources\org\Code.class.php';

class GameMonsterListController extends CommonController
{
    //
    public function index()
    {
    //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gamemonster\' and table_schema=\'gameapp\'');
        $userdata= GameMonster::paginate(20);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata,
            'datasceshi'=>'nihao');
       //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
      //  dd($tabledatas['datas'][0]->$k);
       // $users=GameMonster ::paginate(5);
       return view('admin.GameMonsterlist')->with('tabledatas',$tabledatas);
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
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gamemonster\' and table_schema=\'gameapp\'');
        //使用id查找到当前值
        if ($id==0){
            $tabledatas=array('column_comment'=>$data,
                'data'=>'',
                'etc'=>$etc);

            return view('admin.GameMonsternew')->with('tabledatas',$tabledatas);
        }else{
            $gamemonster= GameMonster::find($id);
            $tabledatas=array('column_comment'=>$data,
                'data'=>$gamemonster,
                'etc'=>$etc);
            return view('admin.GameMonsteredit')->with('tabledatas',$tabledatas);
        }

      //  dd($gamemonster);

    }

    //更新 参数id
    public function update()
    {
        //是实例化gamemonster
        $input=Input::all();
        $mgamemonster= GameMonster::find(next($input));
        foreach ($input as $key => $value){
            $mgamemonster->$key=$value;
        }
        $mgamemonster->save();
       // dd($mgamemonster);
    }


    //更新 参数id
    public function save()
    {

        //是实例化gamemonster
        $input=Input::all();
        $mgamemonster= new GameMonster();
        //通过时间函数获取唯一id
        $nowpriid=$this->getUUID();
        $mfgamemonster= GameMonster::find($nowpriid);
        if ($mfgamemonster!=null){
            return redirect('admin/GameMonsteredit?id=0&etc='.'请重新创建');
        }else{
            foreach ($input as $key => $value){
                $mgamemonster->$key=$value;
            }
            $mgamemonster->gamemonster_id=$nowpriid;
            $mgamemonster->save();
            return redirect('admin/gamemonster');
        }
    }

    public function datalist()
    {
        //
        $time = explode ( " ", microtime () );
        $time = $time [1] . ($time [0] * 1000);
        $time2 = explode ( ".", $time );
        $time = $time2 [0];
        $time=str_replace('149','zz',$time);
        dd($time);
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
        Route::get('admin/gamemonster/ceshi', 'Admin\GameMonsterListController@datalist');
        Route::get('admin/gamemonster', 'Admin\GameMonsterListController@index');
        Route::get('admin/gamemonsteredit', 'Admin\GameMonsterListController@edit');
        Route::get('admin/gamemonsterupdate', 'Admin\GameMonsterListController@update');
        Route::get('admin/gamemonstersave', 'Admin\GameMonsterListController@save');
    }


}
