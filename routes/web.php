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

//后台
Route::group(['middleware' => ['web'],'prefix'=>'admin','namespace'=>'Admin'], function(){
    //跳转登陆页
    Route::get('/', function () { return view('admin.login'); });

    //登陆
    Route::get('login','AdminController@login');
    Route::post('login','AdminController@signin');

    //首页
    Route::get('index', ['as' => 'admin.index', 'uses' => 'AdminController@index']);

});

