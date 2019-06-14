<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('user', 'UserController@show');
Route::get('/admin', '\Modules\Admin\Http\Controllers\AdminController@index');
//登录
Route::any('index/login','IndexController@login');
Route::any('index/index','IndexController@index');  //主页
Route::any('fl/index','FlController@showType');  //主页
