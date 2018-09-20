@extends('admin.master')
@section('content')

<div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="page-header">Thương hiệu</h1>
                                  
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
                                
                                <input class="form-control" name="brand" placeholder="Nhập tên danh mục" value="{!! old('brands')!!}">
                            </div> 
                            
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Hủy</button>
                            {{csrf_field()}}
                        <form>
                    </div>
                </div>
                
            </div>
            
</div>
@endsection