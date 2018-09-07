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
			
				<div class="col-md-6">
					<legend class="text-center">Đăng Kí</legend>
 
			    <div class="row"> 
				     <div class=" col-md-6">
				     	 <input class="form-control" name="firstname" placeholder="Họ" required="" autofocus="" type="text"> 
				     </div> 
				     <div class="col-md-6">
				     	 <input class="form-control" name="lastname" placeholder="Tên" required="" type="text"> 
			     	 </div> 
			    </div>
				     	<input class="form-control" name="youremail" placeholder="Email" type="email"> 
				     	<input class="form-control" name="password" placeholder="Mật khẩu" type="password">
				     	<input class="form-control" name="retypepassword" placeholder="Nhập lại mật khẩu" type="password">
			     
			     	<label class="radio-inline">     
			          <input name="sex" id="inlineCheckbox1" value="male" type="radio">Nam </label>       
			        <label class="radio-inline"> 
			           <input name="sex" id="inlineCheckbox2" value="female" type="radio">  Nữ </label> 
			    <br> 
			    <br> 
			   		 <button class="btn btn-lg btn-primary btn-block" type="submit"> Đăng ký </button> 
				
				</div>
			</form> 
			  
	 </div>

					
				
				
					
		
		
 		
	</body>
</html>