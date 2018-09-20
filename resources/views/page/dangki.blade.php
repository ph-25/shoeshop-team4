@extends('master')
@section('content')
	<body>
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Home</a> 
				</div>
			</div>
			<div class="clearfix"></div>
			<form action="{{route('signin')}}" method="POST" role="form">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				@if(count($errors)>0)	
					<div class="alert alert-danger">
						@foreach($errors->all() as $errors)
							{{$errors}}
						@endforeach	
					</div>
				@endif
				
				@if(Session::has('thanhcong'))
					<div class = "alert alert-success">
						{{Session::get('thanhcong') }}
					</div>						
				@endif

				<div class="col-md-4 col-md-offset-4">
					
								<legend class="text-center">Đăng Kí</legend>
						 	   
				     	 <input class="form-control" name="name" placeholder="Name" required type="text"> 
				     	 <input class="form-control" name="phone" placeholder="Số điện thoại"  type="text"> 
				     	<input class="form-control" name="email" placeholder="Email" type="email"> 
				     	<input class="form-control" name="password" placeholder="Mật khẩu" type="password">
				     	<input class="form-control" name="retypepassword" placeholder="Nhập lại mật khẩu" type="password">
			     
			    <br> 
			   		 <button class="btn btn-lg btn-primary btn-block" type="submit"> Đăng ký </button> 
				
				</div>
			</form> 
			  
	 </div>

					
				
				
					
		
		
 		
	</body>
@endsection