 @extends('admin.master')
 @section('content')
 
 
    <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text">User
                            
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        <!-- In Thông báo -->
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                        @endif
                        <form action="" method="POST">
                            
                             <div class="form-group">
                                <input class="form-control" name="Name" placeholder="Điền vào họ tên" value="{{ $User->name }}">
                            </div>
                            
                            <div class="form-group">
                                <input type='email' class="form-control" name="Email" placeholder="Nhập vào Email" value='{{ $User->email }}' />
                            </div> 
                            <div class = "form-group">
                                <input type="password" name="Pass" placeholder="Mật khẩu"
                                value="{{$User->password}}">
                            </div> 
                             <div class="form-group">
                                <label >Quyền hạn</label>
                               
                                    
                                   <input type="radio" name="Lv" value="1" > Admin 
                                   <input type="radio" name="Lv" value="0" checked="checked" > Member
                                   
                             
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                            {{csrf_field()}}
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </div
@endsection   