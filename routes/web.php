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
Route::get('/product/brand/{id}',[
    'as' => 'view-for-brand',
    'uses' => 'PageController@showForBrand'
]);
//Hiển thị trang danh sách sản phẩm
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
    'as'=>'create-product',
    'uses'=>'ProductController@create'
]);
//Gọi hàm thêm sản phẩm
Route::post('/products/create', [
    'as' => 'add-product',
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
]);
ROute::get('/order/{id}',[
    'as' => 'order-product',
    'uses' => 'PageController@order'
]);
