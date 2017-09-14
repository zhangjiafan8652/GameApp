<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\GameUser;
use App\Http\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IndexController extends CommonController
{
    //
    /**
     *
     */
    public function index()
    {
        $menus=Menu::all();
       // Log::info('登陆后台经过了这里');
       // dd($menus);
       return view('admin.index')->with("menus",$menus);
    }

    public function content()
    {
        return view('admin.indexcontent');
    }


    public function signup()
    {
        return view('admin.signup');
    }

}
