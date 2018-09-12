<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Product;
use Illuminate\Http\Request;
use DB;
use Session;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }

    public function index()
    {
        $product = Product::with('brands')->get();
        $product = Product::paginate(4);
        return view('page/trangchu', ['product' => $product]);
    }

    public function brandIndex()
    {
        $brand = Brand::get();
        return view('admin/brands_list', ['brand' => $brand]);
    }
}