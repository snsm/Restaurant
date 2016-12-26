<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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
            if(Auth::user()->role==User::ROLE_MANAGE){
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

}
