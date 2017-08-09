<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use App\Http\Model\GameUser;
use App\Http\Model\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends CommonController
{
    //
    /**
     *
     */
    public function index()
    {
        $menus=Menu::all();

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
