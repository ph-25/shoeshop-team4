<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;

class PageController extends Controller
{
    //
    public function __construct(){

    }
    //Products List Page
    public function index() {
        $perPage = 4;
        $products = Product::with('brand')
            ->orderby('id','dcse')
            ->paginate($perPage);
        $bestSales = Product::with('brand')
            ->orderby('price','asc')
            ->paginate($perPage);
        $brand = Brand::get();
        return view('page/trangchu',compact('products','brand','bestSales'));
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
        $perPage = 4;
        $newProducts = Product::with('brand')
            ->orderby('id','dcse')
            ->paginate($perPage);
        $groupProducts = Product::where('brand_id',$products->brand_id)->paginate($perPage);
        $genderProducts = Product::where('sex',$products->sex)->paginate($perPage);
        $brand = Brand::with('products')->get();
        $size =  explode(',',$products->size);
        $color =  explode(',',$products->color);
        return view('page/product_detail',compact(  'products','brand','groupProducts','newProducts','genderProducts','size', 'color'));
    }

}
