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
//登录
Route::any('index/login','IndexController@login');
// Route::any('index/index','IndexController@index');  //主页
Route::any('fl/index','FlController@showType');  //主页

//商城前台
Route::any('fashion/index','fashionController@index');
Route::any('fashion/login','fashionController@login'); 
Route::any('fashion/signup','fashionController@signup');  
Route::post('fashion/signup_add','fashionController@signup_add');
Route::post('fashion/updpwd','fashionController@updpwd');      
Route::post('fashion/updpwd_g','fashionController@updpwd_g');
Route::any('fashion/retrieve','fashionController@retrieve'); 
Route::any('fashion/retrieve_g','fashionController@retrieve_g');
Route::any('fashion/sele_rotation','fashionController@sele_rotation');
Route::any('fashion/checkout_add','fashionController@checkout_add');
Route::any('fashion/single','fashionController@single');
Route::any('fashion/products','fashionController@products');
Route::any('fashion/checkout','fashionController@checkout');
Route::any('fashion/changcheck','fashionController@changcheck');
Route::any('fashion/seach','fashionController@seach');
Route::any('fashion/del','fashionController@del');
Route::any('fashion/contact','fashionController@contact');
Route::post('fashion/contact_add','fashionController@contact_add');
Route::any('fashion/seckill','fashionController@seckill');
Route::any('fashion/goodsKill','fashionController@goodsKill');
Route::any('userinfo','UserinfoController@userinfo');

Route::any('login/login','LoginController@login');
Route::any('login/loginOut','LoginController@loginOut');
Route::any('login/signup','LoginController@signup');  
Route::post('login/signup_add','LoginController@signup_add');
Route::any('login/retrieve','LoginController@retrieve'); 
Route::post('login/updpwd','LoginController@updpwd'); 
Route::post('login/updpwd_g','LoginController@updpwd_g');
Route::any('login/retrieve_g','LoginController@retrieve_g');

Route::any('single','FashionController@single');
Route::any('index','fashionController@index');
Route::any('checkout','FashionController@checkout');
<<<<<<< HEAD

//优惠券
Route::any('activing/index','ActivingController@index'); 
Route::any('activing/join','ActivingController@join');  
Route::any('activing/pay','ActivingController@pay'); 
Route::any('activing/active','ActivingController@active');  
=======
>>>>>>> 516790d84f206c056cbd9338a766a48d4ea2e172
