<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\Sys_Menu;
use App\Http\Model\SysUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

require_once 'resources\org\Code.class.php';

class Sys_MenuListController extends CommonController
{
    //
    public function index()
    {
    //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'sys_menu\' and table_schema=\'gameapp\'');
        $userdata= Sys_Menu::paginate(20);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata,
            'datasceshi'=>'nihao');
       //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
      //  dd($tabledatas['datas'][0]->$k);
       // $users=Sys_Menu ::paginate(5);
       return view('admin.Sys_Menulist')->with('tabledatas',$tabledatas);
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
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'sys_menu\' and table_schema=\'gameapp\'');
        //使用id查找到当前值
        if ($id==0){
            $tabledatas=array('column_comment'=>$data,
                'data'=>'',
                'etc'=>$etc);

            return view('admin.Sys_Menunew')->with('tabledatas',$tabledatas);
        }else{
            $sys_menu= Sys_Menu::find($id);
            $tabledatas=array('column_comment'=>$data,
                'data'=>$sys_menu,
                'etc'=>$etc);
            return view('admin.Sys_Menuedit')->with('tabledatas',$tabledatas);
        }

      //  dd($sys_menu);

    }

    //更新 参数id
    public function update()
    {
        //是实例化sys_menu
        $input=Input::all();
        $msys_menu= Sys_Menu::find(next($input));
        foreach ($input as $key => $value){
            $msys_menu->$key=$value;
        }
        $msys_menu->save();
       // dd($msys_menu);
    }


    //更新 参数id
    public function save()
    {

        //是实例化sys_menu
        $input=Input::all();
        $msys_menu= new Sys_Menu();
        //通过时间函数获取唯一id
        $nowpriid=$this->getUUID();
        $mfsys_menu= Sys_Menu::find($nowpriid);
        if ($mfsys_menu!=null){
            return redirect('admin/Sys_Menuedit?id=0&etc='.'请重新创建');
        }else{
            foreach ($input as $key => $value){
                $msys_menu->$key=$value;
            }
            $msys_menu->sys_menu_id=$nowpriid;
            $msys_menu->save();
            return redirect('admin/sys_menu');
        }
    }

    public function datalist()
    {
        //
        $data=DB::select('select COLUMN_NAME,column_comment from INFORMATION_SCHEMA.Columns where table_name=\'sys_menu\' and table_schema=\'gameapp\'');
        $userdata= Sys_Menu::paginate(4);
        $tabledatas=array('column_comment'=>$data,
            'datas'=>$userdata);
        //  $k=$tabledatas['column_comment'][0]->COLUMN_NAME;
         dd($tabledatas['datas']);
        // $users=Sys_Menu ::paginate(5);
        return view('admin.Sys_Menulist')->with('tabledatas',$tabledatas);
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
        Route::get('admin/sys_menu/ceshi', 'Admin\Sys_MenuListController@datalist');
        Route::get('admin/sys_menu', 'Admin\Sys_MenuListController@index');
        Route::get('admin/sys_menuedit', 'Admin\Sys_MenuListController@edit');
        Route::get('admin/sys_menuupdate', 'Admin\Sys_MenuListController@update');
        Route::get('admin/sys_menusave', 'Admin\Sys_MenuListController@save');
    }


}
