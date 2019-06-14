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

Route::any('role/add', 'RoleController@add');
Route::any('admin/out', 'AdminController@out');

Route::any('role/add', 'RoleController@add');
Route::any('menu/index', 'MenuController@index');
Route::any('menu/upMenu', 'MenuController@upMenu');


Route::any('brand/index','BrandController@index');
Route::any('brand/add','BrandController@add');
Route::any('brand/brandDel','BrandController@brandDel');
Route::any('brand/brandUpd','BrandController@brandUpd');
Route::post('brand/brandUpdate','BrandController@brandUpdate');

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
