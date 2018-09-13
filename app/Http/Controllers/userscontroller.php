<?php

namespace App\Http\Controllers;
use App\users;
use Hash;
use Session;
use Auth;
use Illuminate\Http\Request;
use validator;

class userscontroller extends Controller
	{
      

    public function login(){
    	return view('page.dangnhap');
    }

    public function postLogin(Request $request){
    	$this->validate($request,
    		[
    			'email'=>'required|email',
    			'password'=>'required|min:6|max:40'
    		],
    		[
    			'email.required'=>'Vui lòng nhập email',
    			'email.email'=>'Email không đúng định dạng',
    			'password.required'=>'Vui lòng nhập mật khẩu',
    			'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
    			'password.max'=>'Độ dài mật khẩu tối đa 40 ký tự'
    		]
    	);

    	$credentials=array('email'=>$request->email, 'password'=>$request->password);
    	if(Auth::attempt($credentials)){
    		return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']); 
    	}else{
    		return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
    	}
    }

    public function signin(){
    	return view ('page.dangki');
    }
  public function postSignin(Request $request){
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
