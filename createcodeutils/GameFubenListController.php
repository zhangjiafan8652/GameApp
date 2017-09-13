<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\GameFuben;
use App\Http\Model\SysUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once 'resources\org\Code.class.php';

class GameFubenListController extends CommonController
{
    //
    public function index()
    {
    //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gamefuben\' and table_schema=\'gameapp\'');
        $userdata= GameFuben::paginate(20);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata,
            'datasceshi'=>'nihao');
       //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
      //  dd($tabledatas['datas'][0]->$k);
       // $users=GameFuben ::paginate(5);
       return view('admin.GameFubenlist')->with('tabledatas',$tabledatas);
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
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gamefuben\' and table_schema=\'gameapp\'');
        //使用id查找到当前值
        if ($id==0){
            $tabledatas=array('column_comment'=>$data,
                'data'=>'',
                'etc'=>$etc);

            return view('admin.GameFubennew')->with('tabledatas',$tabledatas);
        }else{
            $gamefuben= GameFuben::find($id);
            $tabledatas=array('column_comment'=>$data,
                'data'=>$gamefuben,
                'etc'=>$etc);
            return view('admin.GameFubenedit')->with('tabledatas',$tabledatas);
        }

      //  dd($gamefuben);

    }

    //更新 参数id
    public function update()
    {
        //是实例化gamefuben
        $input=Input::all();
        $mgamefuben= GameFuben::find(next($input));
        foreach ($input as $key => $value){
            $mgamefuben->$key=$value;
        }
        $mgamefuben->save();
       // dd($mgamefuben);
    }


    //更新 参数id
    public function save()
    {

        //是实例化gamefuben
        $input=Input::all();
        $mgamefuben= new GameFuben();
        //通过时间函数获取唯一id
        $nowpriid=$this->getUUID();
        $mfgamefuben= GameFuben::find($nowpriid);
        if ($mfgamefuben!=null){
            return redirect('admin/GameFubenedit?id=0&etc='.'请重新创建');
        }else{
            foreach ($input as $key => $value){
                $mgamefuben->$key=$value;
            }
            $mgamefuben->gamefuben_id=$nowpriid;
            $mgamefuben->save();
            return redirect('admin/gamefuben');
        }
    }

    public function datalist()
    {
        //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'gamefuben\' and table_schema=\'gameapp\'');
        $userdata= GameFuben::paginate(4);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata);
        //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
         dd($tabledatas['datas']);
        // $users=GameFuben ::paginate(5);
        return view('admin.GameFubenlist')->with('tabledatas',$tabledatas);
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
        Route::get('admin/gamefuben/ceshi', 'Admin\GameFubenListController@datalist');
        Route::get('admin/gamefuben', 'Admin\GameFubenListController@index');
        Route::get('admin/gamefubenedit', 'Admin\GameFubenListController@edit');
        Route::get('admin/gamefubenupdate', 'Admin\GameFubenListController@update');
        Route::get('admin/gamefubensave', 'Admin\GameFubenListController@save');
    }


}
