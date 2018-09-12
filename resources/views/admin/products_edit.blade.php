@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('list-product')}}">Danh sách sản phẩm</a> / <span>Cập nhật sản phẩm</span>
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

                        <div class="beta-products-list">
                            <h4 class="pull-left">Thông tin sản phẩm</h4>
                            <div class="clearfix"></div>
                            <div style="padding-bottom: 20px"></div>
                            <div class="col-lg-7" style="padding-bottom:120px">
                                <form  action="{{route('update-product',$products->id)}}" method="POST" enctype="multipart/form-data" role="form">
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
                                        <label>ID Sản phẩm:</label>
                                        <input class="form-control" name="ProductName"  value="{{$products->id}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên Sản Phẩm:</label>
                                        <input class="form-control" name="ProductName"  value="{{$products->name}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm:</label>
                                        <input class="form-control" name="ProductPrice"  value="{{$products->price}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô Tả:</label>
                                        <input class="form-control" type="text" name="ProductContent" value="{{$products->content}}"/>
                                        {{--<textarea class="form-control" rows="10"  name="ProductContent" placeholder="{{$products->content}}"></textarea>--}}
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh hiện tại:</label><br>
                                        <img style="width: 100px; height: 120px;border: solid 1px;" src="{!! asset('public/source/image/product/'.$products['image']) !!}" alt="">
                                        <input type="hidden" value="{!! $products['image'] !!}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh:</label>
                                        <input type="file" name="ProductImage">
                                    </div>
                                    <div class="form-group">
                                        <label>Loại sản phẩm:</label>
                                        <select class="form-control" name="BrandName">
                                            <?php foreach ($brand as $br) :?>
                                            <option  value="{{$br->id}}">{{$br->name}}</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm cho:</label>
                                        @if($products->sex === 1)
                                        <input type="radio" checked="checked"  name="ProductSex"  style="margin-left: 100px; margin-right: 10px;" value="{{$products->sex}}"/>Nam
                                        <input type="radio"   name="ProductSex"  style="margin-left: 100px; margin-right: 10px;" value="{{$products->sex}}"/>Nu
                                        @elseif($products->sex === 0)
                                        <input type="radio"  name="ProductSex"  style="margin-left: 100px; margin-right: 10px;" value="1"/>Nam
                                        <input type="radio"   name="ProductSex" checked="checked" style="margin-left: 100px; margin-right: 10px;" value="0"/>Nu
                                        @endif
                                    </div>
                                    <div class="pull-left">
                                        <label>Màu sản phẩm</label>
                                        <input class="form-control" name="ProductColor" value="{{$products->color}}" style="width: 120px; margin-right: 53px">
                                    </div>
                                    <div class="pull-left">
                                        <label>Kích cỡ của sản phẩm:</label>
                                        <input class="form-control" name="ProductSize" value="{{$products->size}}" style="width: 120px" />
                                    </div>
                                    <div class="pull-right">
                                        <label>Số lượng:</label>
                                        <input class="form-control" name="ProductQuantity" value="{{$products->quantity}}" style="width: 120px" />
                                    </div>
                                    <div class="clearfix"></div>
                                    <div style="padding-bottom: 40px"></div>
                                    <button type="submit" class="btn btn-default">Cập nhật</button>
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

