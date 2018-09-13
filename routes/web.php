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
	'uses'=>'UsersController@login',
]);
Route::post('dangnhap',[
	'as'=>'login',
	'uses'=>'UsersController@login',
]);
Route::get('dangki',[
	'as'=>'signin',
	'uses'=>'UsersController@signin',
]);
Route::post('dangki',[
	'as'=>'signin',
	'uses'=>'UsersController@postSignin',
]);
Route::get('dangxuat',[
	'as'=>'logout',
	'uses'=>'UsersController@logout'
]);

Route::group(['prefix'=>'thuong-hieu'],function (){
		Route::get('danh-sach','BrandController@getListBrand');
		Route::get('them','BrandController@getAddBrand');
		Route::post('them','BrandController@postAddBrand');
		Route::get('sua/{id}','BrandController@getEditBrand');
		Route::post('sua/{id}','BrandController@postEditBrand');
		Route::get('xoa/{id}','BrandController@getDelBrand');
	});	

Route::get('admin/profile', function () {
    //
})->middleware('auth');