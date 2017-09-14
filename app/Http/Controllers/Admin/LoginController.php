<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
require_once 'resources\org\Code.class.php';

class LoginController extends CommonController
{
    //
    public function login()
    {


       return view('admin.login');
    }

    public function register()
    {


        return view('admin.signup');
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
