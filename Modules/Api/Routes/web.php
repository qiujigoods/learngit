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
// Route::any('goods/index', 'GoodsController@index');
//商品详情页
Route::any('goods/detail', 'GoodsController@detail');
//加入购物车
Route::any('goods/join', 'GoodsController@join');
//添加收藏
Route::any('goods/collect', 'GoodsController@collect');
//立即购买
Route::any('goods/buy', 'GoodsController@buy');
//购物车列表
Route::any('goods/goodlist', 'GoodsController@goodlist');
//去结算
Route::any('goods/balance', 'GoodsController@balance');
//删除
Route::any('goods/delete', 'GoodsController@delete');
//数量修改
Route::any('goods/number', 'GoodsController@number');
//下单接口
Route::any('goods/true', 'GoodsController@true');
//调用第三方接口支付接口
// Route::any('goods/index', 'GoodsController@index');