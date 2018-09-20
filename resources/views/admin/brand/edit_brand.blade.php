@extends('admin.master')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thương hiệu
                           
                        </h1>
                    </div>
                   
                    
                       
                        @if(count($errors)>0)
                        <div class="alert alert-danger">

                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                        @endif
                         @if(session('message'))
                            <div class="alert alert-success">
                               
                                {{session('message')}}
                            </div>
                        @endif
                        <form action="" method="POST">
                           
                            <div class="form-group">
                                <label>Tên thương hiệu</label>
                                <input class="form-control" name="brand" placeholder="Nhập tên danh mục" value="{{$Brand->name}}" >
                            </div> 
                           
                            <button type="submit" class="btn btn-default">Lưu</button>
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