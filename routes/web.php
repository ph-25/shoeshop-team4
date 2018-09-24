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
use App\products;
//DB::enableQueryLog();
//
Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[
    'as'=>'trang-chu',
    'uses'=>'PageController@index'
]);
Route::get('/product/details/{id}', [
    'as' => 'details-product',
    'uses' => 'PageController@detail'
]);
Route::get('/product/list', [
    'as' => 'view-product',
    'uses' => 'PageController@show'
]);
Route::get('/brand/{id}',[
    'as' => 'view-for-brand',
    'uses' => 'PageController@showForBrand'
]);
//Hiển thị trang quan ly danh sách sản phẩm
Route::get('/products',[
    'as'=>'list-product',
    'uses'=>'ProductController@index'
]);
Route::get('/products/brand/{id}',[
    'as' => 'products-for-brand',
    'uses' => 'ProductController@getProductType'
]);
//Hiển thị trang thêm sản phẩm
Route::get('/product/create',[
    'as'=>'add-product',
    'uses'=>'ProductController@create'
]);
Route::post('/product/add',[
    'as' => 'create-product',
    'uses' => 'ProductController@store'
]);

//Hiển thị trang cập nhật sản phẩm
Route::get('/products/edit/{id}', [
    'as' => 'edit-product',
    'uses' => 'ProductController@edit'
]);
//Gọi hàm cập nhật sản phẩm
Route::post('/products/edit/{id}', [
    'as' => 'update-product',
    'uses' => 'ProductController@update'
]);
//Gọi hàm xoá sản phẩm
Route::get('/products/{id}', [
    'as' => 'delete-product',
    'uses' => 'ProductController@destroy'
])->where('id', '[0-9]+');
//cart
Route::get('cart',[
    'as' => 'cart',
    'uses' => 'PageController@indexCart'
]);
Route::get('add-cart/{id}',[
    'as' => 'add-cart',
    'uses' => 'PageController@cart'
]);
Route::get('del/{id}',[
    'as' => 'del-pro-cart',
    'uses' => 'PageController@delProCart'
]);
Route::post('update-cart', [
    'as' => 'cart.update',
    'uses' => 'PageController@updateCart'
]);

