<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use DB;
use Session;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductType($id){
        $perPage = 10;
        $products_type = Product::where('brand_id',$id)->paginate($perPage);
        $brand = Brand::get();
        $brand_type = Brand::where('id',$id)->first();
        return view('admin/products_for_brand', compact('products_type','brand','brand_type'));
    }
    public function index()
    {
        $perPage = 10;
        $products = Product::with('brand')->paginate($perPage);
        $brand = Brand::get();
        return view('admin/products_list', compact('products', 'brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::with('brand')->get();
        $brand = Brand::with('products')->get();
        return view('admin/products_add', compact('products', 'brand'));
//        return view('admin/products_add',['brand'=>$brand]);

    }

//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'ProductName' => 'required',
                'ProductPrice' => 'required',
                'ProductContent' => 'required',
                'ProductImage' => 'required',
                'ProductColor' => 'required',
                'BrandName' => 'required',
                'ProductSize' => 'required',
                'ProductSex' => 'required',
                'ProductQuantity' => 'required'

            ],
            [
                'ProductName.required' => 'Vui lòng nhập ten SP',
                'ProductPrice.required' => 'Vui lòng nhập gia SP',
                'ProductContent.required' => 'Vui lòng nhập mo ta SP',
                'ProductImage.required' =>['Vui lòng chon anh SP','image|max:2048'],
                'ProductColor.required' => 'Vui lòng chon mau SP',
                'BrandName.required' => 'Vui lòng chon mau SP',
                'ProductSize.required' => 'Vui lòng chon kich thuoc SP',
                'ProductSex.required' => 'Vui lòng chon giay danh cho nam/nu',
                'ProductQuantity.required' => 'Vui lòng nhap so luong cua SP'
            ]);


        $products = Product::with('brand')->get();
        $file_name = $request->file('ProductImage')->getClientOriginalName();
        $fileName = time() ."_". rand(0,9999999)."_". md5(rand(0,9999999)). "." . $file_name;
        $products = new Product;
        $products->name = $request->ProductName;
        $products->price = $request->ProductPrice;
        $products->content = $request->ProductContent;
        $products->brand_id = $request->BrandName;
        $products->image = $file_name;
//        $products->image = $request->file('ProductImage')->getClientOriginalExtension();
//        $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $products->image;
//        $uploadPath = public_path('/source/image/product');
//        $request->file('ProductImage')->move($uploadPath, $fileName);
        $products->color = $request->ProductColor;
        $products->size = $request->ProductSize;
        $products->sex = $request->ProductSex;
        $products->quantity= $request->ProductQuantity;

        $request->file('ProductImage')->move('public/source/image/product',$file_name);
        $products->save();
//        return redirect()->back()->with('success','Them thanh cong');
        return redirect(route('list-product'))->with('add','Thêm '.$products->name.' thành công!');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function show($id)
    {

    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function edit($id)
    {
        $products = Product::with('brand')->find($id);
        $brand = Brand::with('products')->get();
//        return view('admin/products_edit',['products'=>$products]);
        return view('admin/products_edit',compact(  'products','brand'));

    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function update(Request $request, $id)
    {


        $products = Product::find($id);
//
        if(!empty($request->ProductImage)){
            $file_name = $request->file('ProductImage')->getClientOriginalName();
            $fileName = time() ."_". rand(0,9999999)."_". md5(rand(0,9999999)). "." . $file_name;
            $products->image = $file_name;
            $request->file('ProductImage')->move('public/source/image/product',$fileName);
        }
        else{

        }


        $products->name = $request->ProductName;
        $products->price = $request->ProductPrice;
        $products->content = $request->ProductContent;
        $products->brand_id = $request->BrandName;
//
        $products->color = $request->ProductColor;
        $products->size = $request->ProductSize;
        $products->sex = $request->ProductSex;
        $products->quantity= $request->ProductQuantity;
//        $request->file('ProductImage')->move('public/source/image/product',$file_name);

        $products->update($request->all());
        return redirect(route('list-product'))->with('update','Cập nhật '.$products->name.' thành công!');
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
    public function destroy($id)
    {
        $products = Product::find($id);

        $products->delete($id);

        return redirect()->back()->with('delete','Xoá '.$products->name.' thành công!');
    }
//    public function detail($id)
//    {
//        $products = Product::with('brand')->find($id);
//        $brand = Brand::with('products')->get();
//        return view('admin/products_edit',['products'=>$products]);
//        return view('page/product_detail',compact(  'products','brand'));
//    }
}
