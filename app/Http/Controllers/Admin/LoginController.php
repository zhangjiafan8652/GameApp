<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
require_once 'resources\org\Code.class.php';

class LoginController extends CommonController
{
    //登陆页面
    public function login()
    {
       return view('admin.login');
    }

    //进行登陆
    public function tologin()
    {


        //return view('admin.login');
        $username=Input::get('username');
        $password=Input::get('password');
        $user=DB::select('select * from sys_user where username = ?', [$username]);

       $password= md5($password);
        if(empty($user)){

            return  back()->with('message', '用户为空');

        }
        if($password==$user[0]->password){
           //redirect(("user"))
            Session::put('userid', $user[0]->username);
            return Redirect::to('admin/index');
        }else{
           // dd(md5($password));
            return  back()->with('message', '密码错误');;
        }
     //  dd($user[0]->password);
     //   dd( $user);
    }

    public function signup()
    {


        return view('admin.signup');
    }

    //注册
    public function register(){

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
}
