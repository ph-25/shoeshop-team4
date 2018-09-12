<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function __construct(){

    }
    //Products List Page
    public function index() {
        $perPage = 4;
        $products = Product::with('brand')->paginate($perPage);
        $brand = Brand::get();
        return view('page/trangchu',['products'=>$products]);
    }

    //Product Details Page
    public function getProductDetail(){
        return  view('page/product_detail');
    }
}
