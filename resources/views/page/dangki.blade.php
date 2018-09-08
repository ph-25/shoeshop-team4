<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SIGNIN</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


	
	</head>
	<body>
		<div class="container">

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

				<div class="col-md-6">
					
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
</html>