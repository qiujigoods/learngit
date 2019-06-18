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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
});

Route::any('admin/login', 'AdminController@login');
Route::any('admin/home', 'AdminController@home');
Route::any('admin/out', 'AdminController@out');

Route::any('role/add', 'RoleController@add');


Route::any('brand/index','BrandController@index');
Route::any('brand/add','BrandController@add');
Route::any('brand/brandDel','BrandController@brandDel');
Route::any('brand/brandUpd','BrandController@brandUpd');
Route::post('brand/brandUpdate','BrandController@brandUpdate');

Route::any('goods/index','GoodsController@index');
Route::any('goods/add','GoodsController@add');
Route::any('goods/sel','GoodsController@sel');
Route::any('goods/selval','GoodsController@selval');
Route::any('goods/add_sku','GoodsController@add_sku');
Route::any('goods/member_edit','GoodsController@member_edit');
Route::any('goods/goods_up','GoodsController@goods_up');

Route::any('warehouse/index','WarehouseController@index');
Route::any('warehouse/member_edit','WarehouseController@member_edit');