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
Route::get ('/','Home\HomeController@index')->name ('home');
//Route::get ('home','HomeController@index')->name ('home');
//用户管理
//登陆路由
Route::get ('login','UserController@login')->name ('login');
Route::post ('login','UserController@loginForm')->name ('login');
//注册路由
Route::get ('register','UserController@register')->name ('register');
Route::post('register','UserController@stoer')->name ('register');
//修改密码路由
Route::get ('passwordReset','UserController@passwordReset')->name ('passwordReset');
Route::post ('passwordReset','UserController@passwordResetForm')->name ('passwordReset');
//退出登陆路由
Route::get ('logoff','UserController@logoff')->name ('logoff');
//工具
Route::any ('code/send','Util\CodeController@send')->name ('code.send');

//后台路由
//模拟数据密码secret
Route::group (['middleware' => ['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function (){
	Route::get ('admin','IndexController@index')->name ('index');
	Route::resource('category','CategoryController');
});