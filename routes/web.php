<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//前台微信*************************************************
Route::group(['middleware' => ['web']],function(){

    //前端微信
    Route::group(['prefix'=>'wechat','namespace'=>'Wechat'],function(){

        //首页
        Route::get('/index', ['as' => 'wechat.index', 'uses' => 'IndexController@index']);
        //订单页
        Route::get('/order', ['as' => 'wechat.order', 'uses' => 'IndexController@order']);

    });
});

//后台*************************************************

Route::group(['middleware' => ['web'],'prefix'=>'admin','namespace'=>'Admin'], function(){

    //跳转登陆页
    Route::get('/', function () { return view('admin.login'); });

    //登陆
    Route::get('login','AdminController@login');
    Route::post('login','AdminController@signin');

    Route::group(['middleware' => ['web'=>'admin.login']], function(){

        //首页
        Route::get('index', ['as' => 'admin.index', 'uses' => 'AdminController@index']);

        //退出
        Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AdminController@logout']);

        //用户管理列表
        Route::get('/user-list', ['as' => 'admin.user-list', 'uses' => 'UserController@index']);

        //菜品分类管理列表
        Route::get('/menu-sort-list', ['as' => 'admin.menu-sort-list', 'uses' => 'MenuController@index']);
        Route::post('/menu-sort-insert', ['as' => 'admin.menu-sort-insert', 'uses' => 'MenuController@sortInsert']);
        Route::post('/menu-sort-update', ['as' => 'admin.menu-sort-update', 'uses' => 'MenuController@sortUpdate']);
        Route::any('/menu-sort-order', ['as' => 'admin.menu-sort-order', 'uses' => 'MenuController@sortOrder']);
        Route::get('/menu-sort-list/{id}', ['as' => 'admin.menu-sort-delete', 'uses' => 'MenuController@sortDelete']);

        //菜品管理列表
        Route::get('/menu-list', ['as' => 'admin.menu-list', 'uses' => 'MenuController@menuList']);
        Route::post('/menu-list', ['as' => 'admin.menu-insert', 'uses' => 'MenuController@menuInsert']);

        //订单管理列表
        Route::get('/order-list', ['as' => 'admin.order-list', 'uses' => 'OrderController@index']);
        //订单详情列表
        Route::get('/order-detail-list', ['as' => 'admin.order-detail-list', 'uses' => 'OrderController@orderDetail']);

    });
});

