<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;
use Cache;

class AdminLogin
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
        if (Cache::get('access_token')) {
            if (Cache::get('access_token')['userMobile'] == $request->get('mobile')){
                return redirect('/admin/login')->with('message','用户访问该资源,assessToken错误或过期');
            }
            return $next($request);
        }else{
            return redirect('/admin/login')->with('message','您无权访问该资源，assessToken错误或过期，请登陆！');
        }
    }
}
