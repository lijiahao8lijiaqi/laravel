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
//主页面
Route::get ('/','HomeController@index')->name ('home');
//用户管理
Route::get ('login','UserController@login')->name ('login');
Route::get ('register','UserController@register')->name ('register');
Route::post('register','UserController@stoer')->name ('register');

//工具
Route::any ('code/send','Util\CodeController@send')->name ('code.send');