<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
class CheckIsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $value = Session::get('userid', 'default');

        Log::info('登陆后台经过了这里'.$value);
        if ($value=='default'){
            Log::info('要去login了'.$value);
              return redirect('admin/login');
            // return $next($request);
        }else{
            //return redirect('admin/index');
        }

        return $next($request);
    }
}
