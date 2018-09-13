<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LOGIN</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>

	<body>
		<div class = "container">
			<div id="content">
				<form action="{{route('login')}}" method="POST" role="form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">	
					@if(Session::has('flag'))
						<div class= "alert alert-{{Session::get('flag')}}">
							{{Session::get('message')}}
						</div>
					@endif		
				<div class="col-md-4 col-md-offset-4">									
							<legend class="text-center">Đăng Nhập</legend>

					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" name="email" placeholder="Địa chỉ email" >
					</div>
						
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Mật khẩu">

					</div>

					<div class="radio">
						<label>
							<input type="checkbox" name="remember" id="input" value="Ghi nhớ" checked="checked">
							Ghi nhớ mật khẩu
						</label>
					</div>
																
							<button type="submit" class="btn btn-primary">Login</button>
						
					
				</div>		
				</form>
			</div>
		</div>

	</body>
</html>