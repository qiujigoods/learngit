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