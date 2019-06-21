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
    Route::any('/', 'AdminController@index');
});


Route::any('rbac/index', 'RbacController@index');


Route::any('admin/login', 'AdminController@login');
Route::any('admin/home', 'AdminController@home');
Route::any('admin/out', 'AdminController@out');

Route::any('role/add', 'RoleController@add');
Route::any('admin/welcome', 'AdminController@welcome');
Route::any('admin/login', 'AdminController@login');
Route::any('admin/home', 'AdminController@home');

//权限限制
// Route::any('rbac/index', 'RbacController@index');

//管理员管理  展示 添加 删除 编辑
Route::any('user/index', 'UserController@index')->middleware('rbac');
Route::any('user/add', 'UserController@add')->middleware('rbac');
Route::any('user/del', 'UserController@del')->middleware('rbac');
Route::any('user/save', 'UserController@save')->middleware('rbac');

//角色管理  展示 添加 删除 编辑 角色定位
Route::any('role/index', 'RoleController@index')->middleware('rbac');
Route::any('role/add', 'RoleController@add')->middleware('rbac');
Route::any('role/del', 'RoleController@del')->middleware('rbac');
Route::any('role/save', 'RoleController@save')->middleware('rbac');
Route::any('role/definition', 'RoleController@definition')->middleware('rbac');

//权限管理  展示 添加 删除 编辑 角色授权
Route::any('auth/index', 'AuthController@index')->middleware('rbac');
Route::any('auth/add', 'AuthController@add')->middleware('rbac');
Route::any('auth/del', 'AuthController@del')->middleware('rbac');
Route::any('auth/save', 'AuthController@save')->middleware('rbac');
Route::any('auth/empower', 'AuthController@empower')->middleware('rbac');

Route::any('admin/out', 'AdminController@out');

Route::any('role/add', 'RoleController@add');
Route::any('menu/index', 'MenuController@index');
Route::any('menu/upMenu', 'MenuController@upMenu');
Route::post('menu/upMenuDo', 'MenuController@upMenuDo');
Route::post('menu/delOne', 'MenuController@delOne');
Route::any('menu/add', 'MenuController@add');
Route::post('menu/doAdd', 'MenuController@doAdd');


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
Route::any('type/index', 'TypeController@index');
Route::any('type/add', 'TypeController@add');
Route::any('type/doAdd', 'TypeController@doAdd');
Route::any('type/updFl','TypeController@updFl');
Route::any('type/doUpdate','TypeController@doUpdate');
Route::any('type/delFl','TypeController@delFl');

Route::any('active/add','ActiveController@add');
Route::any('active/doAdd','ActiveController@doAdd');
Route::any('active/index','ActiveController@index');
Route::any('active/del','ActiveController@del');
Route::any('active/upd','ActiveController@upd');
Route::any('active/doUpd','ActiveController@doUpd');



Route::any('customer/pass','CustomerController@pass');
Route::any('customer/comment','CustomerController@comment');
Route::any('customer/feedback','CustomerController@feedback');
Route::any('customer/reply','CustomerController@reply');
Route::any('customer/status','CustomerController@status');

Route::any('order/index','OrderController@index');
Route::any('order/details','OrderController@details');
Route::any('order/statusindex','OrderController@statusindex');
Route::any('order/statusDel','OrderController@statusDel');
Route::any('order/statusUpdate','OrderController@statusUpdate');
