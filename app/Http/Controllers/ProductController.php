<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use DB;
use Session;
use Validator;
use Input;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductType($id)
    {

        $perPage = 5;
        $products_type = Product::where('brand_id', $id)->orderBy('created_at','desc')->paginate($perPage);
        $brands = Brand::get();
        $brand_type = Brand::where('id', $id)->first();
        return view('admin/products_for_brand', compact('products_type', 'brands', 'brand_type'));
    }

    public function index()
    {
        $perPage = 5;
        $products = Product::with('brand')->orderBy('created_at', 'desc')->paginate($perPage);
        $brands = Brand::get();
//        dd($products);
        return view('admin/products_list', compact('products', 'brands','test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $products = Product::with('brand')->get();
        $brands = Brand::get();
        $brand = Brand::pluck('name', 'id');
        return view('admin/products_add', compact('products', 'brands','brand'));
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
        $request->validate(
            [
                'ProductName' => 'required|max:50',
                'ProductPrice' => 'required|integer',
                'ProductContent' => 'required',
                'ProductImage' => 'required',
                'ProductColor' => 'required',
                'BrandName' => 'required',
                'ProductSize' => 'required',
                'ProductSex' => 'required',
                'ProductQuantity' => 'required|integer'
            ],
            [
                'ProductName.required' => 'Chưa nhập tên sản phẩm',
                'ProductName.max' => 'Tên sản phẩm tối đa 50 ký tự',
                'ProductPrice.required' => 'Chưa nhập giá sản phẩm',
                'ProductPrice.integer' => 'Giá của sản phẩm phải là kiểu số nguyên',
                'ProductContent.required' => 'Chưa nhập phần mô tả sản phẩm',
                'ProductImage.required' => 'Chưa chọn ảnh cho sản phẩm',
                'ProductColor.required' => 'Chưa chọn màu cho sản phẩm',
                'BrandName.required' => 'Chưa chọn loại sản phẩm',
                'ProductSize.required' => 'Chưa chọn kích cỡ của sản phẩm',
                'ProductSex.required' => 'Chưa chọn sản phẩm cho Nam/Nữ',
                'ProductQuantity.required' => 'Chưa nhập số lượng có sẵn của sản phẩm',
                'ProductQuantity.integer' => 'Số lượng của sản phẩm phải là kiểu số nguyên'
            ]
        );

        $products = Product::with('brand')->get();
        $brands = Brand::pluck('name', 'id');
        $file_name = $request->file('ProductImage')->getClientOriginalName();
        $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "_" . $file_name;
        $products = new Product;
        $products->name = $request->ProductName;
        $products->price = $request->ProductPrice;
        $products->content = $request->ProductContent;
        $products->brand_id = $request->BrandName;
        $products->image = $file_name;
        $products->color = implode(',', $request->ProductColor);
        $products->size = implode(',', $request->ProductSize);
        $products->sex = $request->ProductSex;
        $products->quantity = $request->ProductQuantity;
        $request->file('ProductImage')->move('public/source/image/product', $file_name);
        $products->save();
        return redirect(route('list-product'))->with('add', 'Thêm ' . $products->name . ' thành công!');
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
        $brands = Brand::get();
        $brand = Brand::pluck('name', 'id');
        return view('admin/products_edit', compact('products', 'brands','brand'));
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
        $request->validate(
            [
                'ProductName' => 'required|max:50',
                'ProductPrice' => 'required|integer',
                'ProductContent' => 'required',
//                'ProductImage' => 'required',
                'ProductColor' => 'required',
                'BrandName' => 'required',
                'ProductSize' => 'required',
                'ProductSex' => 'required',
                'ProductQuantity' => 'required|integer'
            ],
            [
                'ProductName.required' => 'Chưa nhập tên sản phẩm',
                'ProductName.max' => 'Tên sản phẩm tối đa 20 ký tự',
                'ProductPrice.required' => 'Chưa nhập giá sản phẩm',
                'ProductPrice.integer' => 'Giá của sản phẩm phải là kiểu số nguyên',
                'ProductContent.required' => 'Chưa nhập phần mô tả sản phẩm',
//                'ProductImage.required' => 'Chưa chọn ảnh cho sản phẩm',
                'ProductColor.required' => 'Chưa chọn màu cho sản phẩm',
                'BrandName.required' => 'Chưa chọn loại sản phẩm',
                'ProductSize.required' => 'Chưa chọn kích cỡ của sản phẩm',
                'ProductSex.required' => 'Chưa chọn sản phẩm cho Nam/Nữ',
                'ProductQuantity.required' => 'Chưa nhập số lượng có sẵn của sản phẩm',
                'ProductQuantity.integer' => 'Số lượng của sản phẩm phải là kiểu số nguyên'
            ]
        );

        $brands = Brand::pluck('name', 'id');
        $products = Product::find($id);
//
        if (!empty($request->ProductImage)) {
            $file_name = $request->file('ProductImage')->getClientOriginalName();
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $file_name;
            $products->image = $file_name;
            $request->file('ProductImage')->move('public/source/image/product', $fileName);
        }

        $products->name = $request->ProductName;
        $products->price = $request->ProductPrice;
        $products->content = $request->ProductContent;
        $products->brand_id = $request->BrandName;
        $products->color = implode(',', $request->ProductColor);
        $products->size = implode(',',$request->ProductSize);
//        $products->size = implode(',', $request->ProductSize);
        $products->sex = $request->ProductSex;
        $products->quantity = $request->ProductQuantity;
//        $request->file('ProductImage')->move('public/source/image/product',$file_name);

        $products->update($request->all());
//        $products->save();
        return redirect(route('list-product'))->with('update', 'Cập nhật ' . $products->name . ' thành công!');
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
        return redirect()->back()->with('delete', 'Xoá ' . $products->name . ' thành công!');
    }

}
