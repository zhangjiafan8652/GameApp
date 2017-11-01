<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    //


    //zz+时间戳为唯一id
    public function getUUID()
    {
        //
        $time = explode ( " ", microtime () );
        $time = $time [1] . ($time [0] * 1000);
        $time2 = explode ( ".", $time );
        $time = $time2 [0];
        $time=str_replace('149','zz',$time);
        return $time;
    }

}
