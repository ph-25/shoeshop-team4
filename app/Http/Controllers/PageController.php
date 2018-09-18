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
        return view('page/trangchu',compact('products','brand'));
    }
    public function show() {

        $products = Product::with('brand')->get();
        $brand = Brand::get();
        return view('page/view_products',compact('products','brand'));
    }
    public function showForBrand($id){

        $products_type = Product::where('brand_id',$id)->get();
        $brand = Brand::get();
        $brand_type = Brand::where('id',$id)->first();
        return view('page/view_for_brand', compact('products_type','brand','brand_type'));
    }
    //Product Details Page
    public function detail($id){
        $products = Product::with('brand')->find($id);
        $brand = Brand::with('products')->get();
        return view('page/product_detail',compact(  'products','brand'));
    }
}
