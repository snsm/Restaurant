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

//跳转登陆页
Route::get('/', function () { return view('admin.login'); });

//登陆
Route::get('admin/login','Admin\AdminController@login');
Route::post('admin/login','Admin\AdminController@signin');

Route::group(['middleware' => ['web'=>'admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function(){

    //首页
    Route::get('index', ['as' => 'admin.index', 'uses' => 'AdminController@index']);

    //用户管理列表
    Route::get('/user-list', ['as' => 'admin.user-list', 'uses' => 'UserController@index']);

    //菜品分类管理列表
    Route::get('/menu-sort-list', ['as' => 'admin.menu-sort-list', 'uses' => 'MenuController@index']);

    //菜品管理列表
    Route::get('/menu-list', ['as' => 'admin.menu-list', 'uses' => 'MenuController@menuList']);

    //订单管理列表
    Route::get('/order-list', ['as' => 'admin.order-list', 'uses' => 'OrderController@index']);
    //订单详情列表
    Route::get('/order-detail-list', ['as' => 'admin.order-detail-list', 'uses' => 'OrderController@orderDetail']);

});

