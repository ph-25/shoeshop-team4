<?php

namespace App\Http\Controllers;
use App\users;
use Hash;
use Session;
use Illuminate\Http\Request;

class userscontroller extends Controller
{
    public function login(){
    	return view('page.dangnhap');

    }

    public function signin(){
    	return view ('page.dangki');
    }
  public function postsignin(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:40',
                'name'=>'required',
                'retypepassword'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'retypepassword.same'=>'Mật khẩu không trùng khớp',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $users = new users();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }


    public function logout(){
      
        return redirect()->route('login');
    }

}
