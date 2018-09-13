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
    public function getProductType($id)
    {
        $perPage = 10;
        $products_type = Product::where('brand_id', $id)->orderBy('created_at','desc')->paginate($perPage);
        $brand = Brand::get();
        $brand_type = Brand::where('id', $id)->first();
        return view('admin/products_for_brand', compact('products_type', 'brand', 'brand_type'));
    }

    public function index()
    {
        $perPage = 10;
        $products = Product::with('brand')->orderBy('created_at', 'desc')->paginate($perPage);
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
                'ProductName' => 'required|max:20',
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
                'ProductName.max' => 'Tên sản phẩm tối đa 20 ký tự',
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
            ]);

        $products = Product::with('brand')->get();
        $file_name = $request->file('ProductImage')->getClientOriginalName();
        $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $file_name;
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
//        return redirect()->back()->with('success','Them thanh cong');
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
        $brand = Brand::with('products')->get();
//        return view('admin/products_edit',['products'=>$products]);
        return view('admin/products_edit', compact('products', 'brand'));

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
        $this->validate($request,
            [
                'ProductName' => 'required',
                'ProductPrice' => 'required|integer',
                'ProductContent' => 'required',//
                'ProductColor' => 'required',
                'BrandName' => 'required',
                'ProductSize' => 'required',//
                'ProductQuantity' => 'required|integer'
            ],
            [
                'ProductName.required' => 'Chưa nhập tên sản phẩm',
                'ProductPrice.required' => 'Chưa nhập giá sản phẩm',
                'ProductPrice.integer' => 'Giá của sản phẩm phải là kiểu số nguyên',
                'ProductContent.required' => 'Chưa nhập phần mô tả sản phẩm',
                'ProductColor.required' => 'Chưa chọn màu cho sản phẩm',
                'BrandName.required' => 'Chưa chọn loại sản phẩm',
                'ProductSize.required' => 'Chưa chọn kích cỡ của sản phẩm',
                'ProductQuantity.required' => 'Chưa nhập số lượng có sẵn của sản phẩm',
                'ProductQuantity.integer' => 'Số lượng của sản phẩm phải là kiểu số nguyên'
            ]);


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
