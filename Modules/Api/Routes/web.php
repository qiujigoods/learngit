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

Route::prefix('api')->group(function() {
    Route::get('/', 'ApiController@index');
});

<<<<<<< HEAD

=======
//分类商品列表
<<<<<<< HEAD
Route::any('interface/index', 'InterfaceController@index');
=======
// Route::any('goods/index', 'GoodsController@index');
>>>>>>> 20216350aee4d7761129a572d1207427a887daab
>>>>>>> 3bade7f0df49aa60d0e190b7ab5527ab1f810855
//商品详情页
Route::any('interface/detail', 'InterfaceController@detail');
//加入购物车
Route::any('interface/join', 'InterfaceController@join');
//添加收藏
Route::any('interface/collect', 'InterfaceController@collect');
//立即购买
Route::any('interface/buy', 'InterfaceController@buy');
//购物车列表
Route::any('interface/goodlist', 'InterfaceController@goodlist');
//去结算
Route::any('interface/balance', 'InterfaceController@balance');
//删除
Route::any('interface/delete', 'InterfaceController@delete');
//数量修改
Route::any('interface/number', 'InterfaceController@number');
//下单接口
Route::any('interface/active', 'InterfaceController@active');
//调用第三方接口支付接口
// Route::any('interface/index', 'InterfaceController@index');