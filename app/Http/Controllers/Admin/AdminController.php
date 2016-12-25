<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function signin(LoginRequest $request)
    {
        $user = User::where('mobile',$request->get('mobile'));
        dd($user);
    }

    public function index()
    {
        return view('admin.index');
    }

}
