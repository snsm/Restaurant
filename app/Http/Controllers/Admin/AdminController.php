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
        $filed = filter_var($request->get('mobile'),FILTER_VALIDATE_EMAIL)? 'name':'mobile';

        $request->merge([$filed=>$request->get('mobile')]);

        if(Auth::attempt($request->only($filed,'password'))){

            $accessToken = [ 'accessToken' => str_random(60),'userMobile' => Auth::user()->mobile,];
            Cache::add('access_token',$accessToken,60);

            if(Auth::user()->role==User::ROLE_MANAGE){
                return redirect('admin/index');
            }
            return redirect('admin/login')->with('message', '用户名或者密码错误！');
        }

        return redirect('admin/login')->with('message', '用户名或者密码错误！');
    }

    public function index()
    {
        //Cache::pull('access_token');
        return view('admin.index');
    }

}
