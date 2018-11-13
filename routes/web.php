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
Route::get ('edu/index/index','Edu\IndexController@index')->name ('edu.index.index');
Route::get ('edu/index/create','Edu\IndexController@create')->name ('edu.index.create');
Route::post('edu/index/store','Edu\IndexController@store')->name ('edu.index.store');

Route::resource ('edu/article','Edu\ArticleController');
//route list
