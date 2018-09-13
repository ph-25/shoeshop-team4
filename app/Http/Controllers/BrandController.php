<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\brands;
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
    	$brands = new brands;
    	$brands->name = $request->brand;
    	$brands->save();
    	return  redirect('thuong-hieu/danh-sach')->with('message',"Thêm thành công");
    }
    public function getListBrand()
    {
    	$brands = brands::all();
    	return view('admin.brand.list_brand',compact('brands'));
    }
    public function getEditBrand($id)
    {
    	$brands = brands::find($id);
    	return view('admin.brand.edit_brand',compact('brands'));
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
    	$brands = brands::find($id);
    	$brands->name = $request->brand;
    	$brands->save();
    	return redirect("thuong-hieu/sua/".$id)->with('message','Sửa thành công'); 
    }
    public function getDelBrand($id)
   {
        $brands = brands::find($id);
        $brands->delete();
        return redirect('thuong-hieu/danh-sach')->with('message','Xóa thành công');
   }
}
