<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Hash;
use Auth;
use Session;
use function Sodium\compare;

class PageController extends Controller
{
    //
    public function __construct(){

    }
    //Products List Page
    public function index() {
        $perPage = 4;
        $products = Product::with('brand')
            ->orderby('created_at','desc')
            ->paginate($perPage);
        $bestSales = Product::with('brand')
            ->orderby('price','asc')
            ->paginate($perPage);
        $brands = Brand::get();
        return view('page/trangchu',compact('products','brands','bestSales'));
    }
    public function show() {
        $perPage = 16;
        $products = Product::with('brand')->orderBy('created_at','desc')->paginate($perPage);
        $brands = Brand::get();
        return view('page/view_products',compact('products','brands'));
    }
    public function showForBrand($id){

        $products_type = Product::where('brand_id',$id)->get();
        $brands = Brand::get();
        $brand_type = Brand::where('id',$id)->first();
        return view('page/view_for_brand', compact('products_type','brands','brand_type'));
    }
    //Product Details Page
    public function detail($id){
        $products = Product::with('brand')->find($id);
        $perPage = 4;
        $newProducts = Product::with('brand')
            ->orderby('id','desc')
            ->paginate($perPage);
        $groupProducts = Product::where('brand_id',$products->brand_id)->paginate($perPage);
        $genderProducts = Product::where('sex',$products->sex)->paginate($perPage);
        $brands = Brand::with('products')->get();
        $size =  explode(',',$products->size);
        $color =  explode(',',$products->color);
        return view('page/product_detail',compact(  'products','brands','groupProducts','newProducts','genderProducts','size', 'color'));
    }
    public function indexCart(){
        $brands = Brand::get();
        $content = Cart::content();
        //dd($content);
        $subtotal = Cart::subtotal(0,',','.');
        return view('page/cart',compact('content','subtotal','brands'));
    }
    public function cart ($id){
        $products = Product::where('id',$id)->first();
        Cart::add(array(
            'id'=>$id,
            'name'=>$products->name,
            'qty'=>"1",
            'price'=>$products->price,
            'options'=>array('image'=>$products->image)));
        $content = Cart::content();
        return redirect()->back()->with('addcart','Đã thêm '.$products->name.' vào giỏ hàng');
    }
    public function delProCart($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function updateCart(Request $request){
        $quantities = $request->quantity;
        foreach ($quantities as $rowID => $quantity){
            Cart::update($rowID, $quantity);
        }
        return redirect()->back();
    }
}
