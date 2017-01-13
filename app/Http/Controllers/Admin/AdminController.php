<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Cache;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function signin(LoginRequest $request)
    {
        $filed = filter_var($request->get('user_mobile'),FILTER_VALIDATE_EMAIL)? 'user_name':'user_mobile';

        $request->merge([$filed=>$request->get('user_mobile')]);

        if(Auth::attempt($request->only($filed,'password'))){

            $accessToken = [ 'accessToken' => str_random(60),'userMobile' => Auth::user()->user_mobile,];
            Cache::add('access_token',$accessToken,60);

            if(Auth::user()->user_role==User::ROLE_MANAGE){
                return redirect('admin/index');
            }
            return redirect('admin/login')->with('message', '用户名或者密码错误！');
        }

        return redirect('admin/login')->with('message', '用户名或者密码错误！');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function logout(Request $request)
    {
        Cache::pull('access_token');
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/admin/login');
    }

}
