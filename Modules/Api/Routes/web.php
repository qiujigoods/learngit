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

//分类商品列表
Route::any('interface/index', 'InterfaceController@index');
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