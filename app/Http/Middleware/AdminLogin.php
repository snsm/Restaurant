<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;

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
        if (Auth::guard($request->get('mobile'))->check()) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
