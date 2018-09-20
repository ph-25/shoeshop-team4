@extends('master')
@section('content')

	<body>
		<div class = "container">
			<div id="content">
				<form action="{{route('login')}}" method="POST" role="form">
					<input type="hidden" name="_token" value="{{csrf_token()}}">	
					@if(count($errors)>0)	
						<div class="alert alert-danger">
						@foreach($errors->all() as $errors)
							{{$errors}}
						@endforeach	
						</div>
					@endif
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

					
						<label>
							<input type="checkbox" name="remember" value="Ghi nhớ" 	>
							Ghi nhớ mật khẩu
						</label>
				
																
							<button type="submit" class="btn btn-primary">Login</button>
						
					
				</div>		
				</form>
			</div>
		</div>

	</body>
@endsection