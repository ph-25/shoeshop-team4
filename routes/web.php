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

// Route::get('index',['as'=>'trangchu', 'uses'=>'pagecontroller@index']);

Route::get('dangnhap',[
	'as'=>'login',
	'uses'=>'userscontroller@login',
]);
Route::post('dangnhap',[
	'as'=>'login',
	'uses'=>'userscontroller@postlogin',
]);
Route::get('dangki',[
	'as'=>'signin',
	'uses'=>'userscontroller@signin',
]);
Route::post('dangki',[
	'as'=>'signin',
	'uses'=>'userscontroller@postsignin',
]);
Route::get('dangxuat',[
	'as'=>'logout',
	'uses'=>'userscontroller@logout'
]);