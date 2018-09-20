@extends('admin.master')
@section('content')
    <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="page-header">Add User
                           
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
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                        @endif

                        
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Nhập Tên</label>
                                <input class="form-control" name="name" placeholder="Điền vào họ tên"  >
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type='email' class="form-control" name="email" placeholder="Nhập vào Email" >
                            </div> 
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type='password' class="form-control" name="password" placeholder="Nhập vào Mật khẩu" >
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Mật khẩu</label>
                                <input type='password' class="form-control" name="retypepasswpord" placeholder="Nhập vào Mật khẩu" >
                            </div>
                             <div class="form-group">
                                <label style="margin-right: 20px">Quyền hạn</label>
                                <label class="radio-inline">
                                    <input name="Lv" value="0" type="radio" checked="">Người dùng
                                </label>
                                <label class="radio-inline">
                                    <input name="Lv" value="1"  type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                            {{csrf_field()}}
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </div>
@endsection    
