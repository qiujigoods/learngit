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
Route::any('type/index', 'TypeController@index');
Route::any('type/add', 'TypeController@add');
Route::any('type/doAdd', 'TypeController@doAdd');

Route::any('type/updFl','TypeController@updFl');
Route::any('type/doUpdate','TypeController@doUpdate');

Route::any('type/delFl','TypeController@delFl');
