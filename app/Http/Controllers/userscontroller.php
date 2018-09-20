<?php

namespace App\Http\Controllers;
use Hash;
use Session;
use Auth;
use Illuminate\Http\Request;
use validator;
use App\User;
use App\Brand;
class userscontroller extends Controller
	{
      
       public function getIndex()
    {
        // $perPage = 10;
        // $products = Product::with('brand')->orderBy('created_at', 'desc')->paginate($perPage);
        // $brand = Brand::get();
        // return view('trangchu', compact('products', 'brand'));
        return view('trangchu');
    }


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
             $login = [
            'email' => $request->email,
            'password' => $request->password,
            'user_type'=> 1,
        ];
        if (Auth::attempt($login)) {
            return redirect('admin/User/danh-sach');
            
        }

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
        $User = new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->phone = $request->phone;
        $User->address = $request->address;
        $User->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }


    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

     public function getAddUser()
    {
        return view('admin.user.add_user');
    }
    public function postAddUser(Request $request)
    {
        $this->validate($request,[
            'email' => 'unique:users,email',
            'password'  => 'required|min:6',
            
        ],
        [
            'email.unique'   => 'Email đã tồn tại',
           'password.required'=>'Vui lòng nhập mật khẩu',
           'password.min' => 'Mật khẩu tối đa 6 kí tự'
          
        ]);
        $User           = new User;
        $User->name     = $request->name;
       
        $User->email    = $request->email;
        $User->password = bcrypt($request->password);
        $User->user_type = $request->Lv;
        $User->save();
        return redirect('admin/User/danh-sach')->with('message','Thêm thành công');
    }

     public function getListUser()
    {
        $User = User::all();
       
        return view('admin.User.list_user',compact('User'));
    }

    public function getEditUser($id)
    {
        $User = User::find($id);
        return view('admin.User.edit_user',compact('User'));
    }
        public function postEditUser(Request $request, $id)
    {
        $this->validate($request,[
            'Name' => 'required',
            'Pass' => 'required|min:6',
            'Email'     => "required|email|unique:users,email,".$id,
        ],
        [
            'Name.required' => 'Bạn chưa nhập Tên',
            'Email.required' => 'Bạn chưa nhập Email',
            'Email.email'  => 'Bạn chưa nhập đúng định dạng Email',
            'Email.unique'  => 'Email đã tồn tại',
            'Pass.required' =>'Bạn chưa nhập mật khẩu',
            'Pass.min'     => 'Mật khẩu tối đa 6 kí tự ' ,         
        ]);
        $User            = User::find($id);
        $User->name = $request->Name;
        $User->email      = $request->Email;
        $User->user_type      = $request->Lv;    
        $User->save();
        return redirect('admin/User/sua/'.$id)->with('message','Sửa thành công');
    }

    public function getDelUser($id){
        $User=User::find($id);
        $User->delete();
        return redirect('admin/User/danh-sach')->with('message','Xoá thành công');
    }
    

}

