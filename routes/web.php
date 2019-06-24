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
    return view('fashion/index');
});
Route::get('user', 'UserController@show');
Route::get('/admin', '\Modules\Admin\Http\Controllers\AdminController@index');
// //登录
// Route::any('index/login','IndexController@login');
// Route::any('index/index','IndexController@index');  //主页
// Route::any('fl/index','FlController@showType');  //主页

Route::any('login/login','LoginController@login');
Route::any('login/loginOut','LoginController@loginOut');
Route::any('login/signup','LoginController@signup');  
Route::post('login/signup_add','LoginController@signup_add');
Route::any('login/retrieve','LoginController@retrieve'); 
Route::post('login/updpwd','LoginController@updpwd'); 
Route::post('login/updpwd_g','LoginController@updpwd_g');
Route::any('login/retrieve_g','LoginController@retrieve_g');

Route::any('single','FashionController@single');
Route::any('index','FashionController@index');
Route::any('checkout','FashionController@checkout');