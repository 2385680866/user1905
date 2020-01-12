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
    return view('welcome');
});
//用户注册
Route::get('/reg1',"Admin\UserController@reg1");
Route::get('/reg',"Admin\UserController@reg2");
//用户登录
Route::get('/login',"Admin\UserController@login");
//用户列表
Route::get('/list',"Admin\\UserController@list");
