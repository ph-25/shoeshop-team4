<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Brand;
use App\validator;
class BrandController extends Controller
{
     public function getAddBrand()
    {
    	return view('admin.brand.add_brand');
    }
    public function postAddBrand(Request $request)
    {
    	$this->validate($request,[
    		"brand" => "required|unique:brands,name",
    		
    	],
    	[
    		"brand.required" => "Bạn chưa nhập tên thương hiệu",
    		"brand.unique" => "Thương hiệu đã tồn tại",
    		
    	]);
    	$Brand = new Brand;
    	$Brand->name = $request->brand;
    	$Brand->save();
    	return  redirect('admin/brand/danh-sach')->with('message',"Thêm thành công");
    }
    public function getListBrand()
    {
    	$Brand = Brand::all();
    	return view('admin.brand.list_brand',compact('Brand'));
    }
    public function getEditBrand($id)
    {
    	$Brand = Brand::find($id);
    	return view('admin.brand.edit_brand',compact('Brand'));
    }
    public function postEditBrand($id, Request $request)
    {
    	$this->validate($request,[
    		"brand" => "required|unique:brands,name",
    		
    	],
    	[
    		"brand.required" => "Bạn chưa nhập tên thương hiệu",
    		"brand.unique" => "Thương hiệu đã tồn tại",
    		
    	]);
    	$Brand=  Brand::find($id);
    	$Brand->name = $request->brand;
    	$Brand->save();
    	return redirect("admin/brand/sua/".$id)->with('message','Sửa thành công'); 
    }
    public function getDelBrand($id)
   {
        $Brand = Brand::find($id);
        $Brand->delete();
        return redirect('admin/brand/danh-sach')->with('message','Xóa thành công');
   }
}
