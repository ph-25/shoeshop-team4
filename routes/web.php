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

//DB::enableQueryLog();
//
Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'UsersController@getIndex',
]);


Route::get('dangnhap',[
	'as'=>'login',
	'uses'=>'UsersController@login',
]);
Route::post('dangnhap',[
	'as'=>'login',
	'uses'=>'UsersController@postLogin',
]);
Route::get('dangki',[
	'as'=>'signin',
	'uses'=>'UsersController@signin',
]);
Route::post('dangki',[
	'as'=>'signin',
	'uses'=>'userscontroller@postSignin',
]);
Route::get('dangxuat',[
	'as'=>'logout',
	'uses'=>'UsersController@postLogout'
]);



// Route::get('/',[
//     'as'=>'trang-chu',
//     'uses'=>'PageController@getIndex'
// ]);
// Route::get('/brands',[
//     'as'=>'loai-giay',
//     'uses'=>'PageController@getBrand'
// ]);
// Route::get('/product-detail',[
//     'as'=>'chi-tiet-san-pham',
//     'uses'=>'PageController@getProductDetail'
// ]);

// Route::get('/products', [
//     'uses' => 'AdminController@index'
// ]);

Route::group(['prefix'=>'admin', 'middleware'=>'admin'],function (){
	Route::group(['prefix'=>'brand'],function (){
		Route::get('them','BrandController@getAddBrand');
		Route::post('them','BrandController@postAddBrand');
		Route::get('danh-sach','BrandController@getListBrand');
		Route::get('sua/{id}','BrandController@getEditBrand');
		Route::post('sua/{id}','BrandController@postEditBrand');
		Route::get('xoa/{id}','BrandController@getDelBrand');
	});

	Route::group(['prefix'=>'User'],function (){
		Route::get('them','UsersController@getAddUser');
		Route::post('them','UsersController@postAddUser');
		Route::get('danh-sach','UsersController@getListUser');
		Route::get('sua/{id}','UsersController@getEditUser');
		Route::post('sua/{id}','UsersController@postEditUser');
		Route::get('xoa/{id}','UsersController@getDelUser');
	});


		// Route::get('login', 
		// [
		// 	'as' => 'login', 
		// 	'uses' => 'AdminLoginController@getLogin'
		// ]);
		// Route::post('login',
		// [
		//  	'as' => 'login', 
		//  'uses' => 'AdminLoginController@postLogin'
		// ]);
		// Route::get('logout', 
		// [
		// 		'as' => 'logout', 
		// 	'uses' => 'AdminLoginController@getLogout'
		// ]);

		
		// 	Route::get('/', function() {
		// 		return view('admin.master');
		// 	});
});
