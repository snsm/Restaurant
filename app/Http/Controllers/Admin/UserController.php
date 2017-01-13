<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all()->where('user_role',User::ROLE_USER);
        return view('admin.user-list',compact('user'));
    }
}
