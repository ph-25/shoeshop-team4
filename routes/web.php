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
    'uses'=>'PageController@getIndex'
]);
Route::get('/brands',[
    'as'=>'loai-giay',
    'uses'=>'PageController@getBrand'
]);
Route::get('/product-detail',[
    'as'=>'chi-tiet-san-pham',
    'uses'=>'PageController@getProductDetail'
]);

Route::get('/products', [
    'uses' => 'AdminController@index'
]);
