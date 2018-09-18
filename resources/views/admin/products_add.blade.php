@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">

            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Danh sách sản phẩm </a> / <span>Thêm sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-9">
                        <div class="pull-right">
                            <a class="form-control" style="text-align: center; background-color: #5c92cf; color: yellow; padding:5px 3px 5px 3px" href="{{route('list-product')}}">Quay lại danh sách sản phẩm</a>
                        </div>
                        <div class="beta-products-list">
                            <h4 style="margin-bottom: 30px">Thêm sản phẩm</h4>

                            <div class="clearfix"></div>

                            <div class="col-lg-7" style="padding-bottom:120px">
                            <form  action="{{route('add-product')}}" enctype="multipart/form-data" method="POST" role="form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                    @if(count($errors)>0)
                                        <div class="alert alert-danger">
                                            @foreach($errors->all() as $err)
                                                {{$err}}
                                            @endforeach
                                        </div>
                                    @endif

                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Tên sản phẩm:</label>
                                        <input class="form-control" name="ProductName" placeholder="Tên Sản Phẩm" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm:</label>
                                        <input class="form-control" name="ProductPrice" placeholder="Giá" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả sản phẩm:</label>
                                        <textarea class="form-control" rows="3" name="ProductContent" required placeholder="Mô Tả"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh sản phẩm:</label>
                                        <input type="file"  name="ProductImage">
                                    </div>
                                    <div class="form-group">
                                        <label>Loại sản phẩm:</label>
                                        <select class="form-control" name="BrandName">
                                            <?php foreach ($brand as $sp) :?>
                                            <option value="{{$sp->id}}">{{$sp->name}}</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm cho:</label>
                                        <input type="radio"  name="ProductSex"  style="margin-left: 100px;margin-right: 10px;" value="1"/>Nam
                                        <input type="radio"  name="ProductSex"  style="margin-left: 100px;margin-right: 10px;" value="0"/>Nu
                                    </div>

                                    <div class="pull-left">
                                        <label>Màu sản phẩm:</label>
                                        <input class="form-control" name="ProductColor" style="width: 120px; margin-right: 60px" required>
                                    </div>
                                    <div class="pull-left">
                                        <label>Kích cỡ của sản phẩm:</label>
                                        <input class="form-control" name="ProductSize[] " style="width: 120px" required/>
                                    </div>
                                    <div class="pull-right">
                                        <label>Số lượng:</label>
                                        <input class="form-control" name="ProductQuantity" style="width: 120px" required/>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div style="padding-bottom: 40px"></div>
                                        <button type="submit" class="btn btn-default" style="width: 120px; margin-right: 60px">Thêm</button>
                                        <button type="reset" class="btn btn-default" style="width: 120px;">Làm Mới</button>
                            </form>
                            </div>
                            <div class="space50">&nbsp;</div>
                        </div> <!-- end section with sidebar and main content -->
                    </div> <!-- .main-content -->
                </div> <!-- #content -->
            </div> <!-- .container -->
        </div>
    </div>

@endsection


