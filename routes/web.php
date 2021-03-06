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
Route::group (['prefix'=>'home','namespace'=>'Home','as'=>'home.'],function (){
	Route::get ('/','HomeController@index')->name ('index');
	//文章管理
	Route::resource ('article','ArticleController');
	//评论
	Route::resource('comment','CommentController');
	//点赞跟取消赞
	Route::get ('zan/make','ZanController@make')->name ('zan.make');
	//收藏
	Route::get ('enshrine','CollateController@enshrine')->name ('enshrine');
	Route::get ('search','HomeController@search')->name ('search');

});
//会员中心
Route::group (['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function (){
	Route::resource ('user','UserController');
	//定义关注 取消关注
	Route::get ('attention/{user}','UserController@attention')->name ('attention');
	//我的粉丝
	Route::get ('get_fans/{user}','UserController@myFans')->name ('my_fans');
	//我的关注
	Route::get ('get_following/{user}','UserController@myFollowing')->name ('my_following');
	//我的收藏
	Route::get ('get_collate/{user}','UserController@myCollate')->name ('my_collate');
	//我的点赞
	Route::get ('get_zan/{user}','UserController@myZan')->name ('my_zan');
	//我的全部通知
	Route::get ('notify/{user}','NotifyController@index')->name ('notify');
	//标记已读消息
	Route::get ('notify/show/{notify}','NotifyController@show')->name ('notify.show');
});
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
Route::group (['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function (){
	Route::any ('code/send','CodeController@send')->name ('code.send');
	Route::any ('upload','UploadController@uploader')->name ('upload');
	Route::any ('filesLists','UploadController@filesLists')->name ('filesLists');

});


//后台路由
//模拟数据密码secret
Route::group (['middleware' => ['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function (){
	Route::get ('admin','IndexController@index')->name ('index');
	Route::resource('category','CategoryController');
});