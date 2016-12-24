<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menu-sort-list');
    }

    public function menuList()
    {
        return view('admin.menu-list');
    }
}
