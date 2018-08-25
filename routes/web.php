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
//静态页面
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('help', 'StaticPagesController@help')->name('help');
Route::get('about', 'StaticPagesController@about')->name('about');

//资源路由虽然包含了create，但可以在之前先定义，这样会覆盖掉资源路由的方法
Route::get('signup','UsersController@create')->name('signup');
//资源路为数据的CRUD路径，相当于创建了7个Route::xxx()->name('users.方法')
//GET方法均请求页面，POST等方法用于数据处理
//遵循RESTful规范
Route::resource('users','UsersController');

//会话控制
Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','SessionsController@destroy')->name('logout');
