<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order-list');
    }

    public function orderDetail()
    {
        return view('admin.order-detail-list');
    }
}
