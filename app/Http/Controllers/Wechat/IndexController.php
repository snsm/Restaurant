<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sort;
use App\Menu;

class IndexController extends Controller
{
    public function Index(){
        $sorts = (new Sort())->getSorts();
        $menus = Menu::all();
        return view('wechat.index',compact('sorts','menus'));
    }

    public function order(){
        return view('wechat.order');
    }

}
