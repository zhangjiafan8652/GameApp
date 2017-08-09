<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\SysUser;
use Illuminate\Http\Request;
require_once 'resources\org\Code.class.php';

class UserListController extends CommonController
{
    //
    public function index()
    {
       $users= SysUser::paginate(10);
       // $users=GameUser ::paginate(5);
       return view('admin.userlist')->with('userlist',$users);
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
