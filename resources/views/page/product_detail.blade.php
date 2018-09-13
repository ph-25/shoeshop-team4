@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img style="border: solid 1px;" src="{!! asset('public/source/image/product/'.$products['image']) !!}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h2>{{$products->name}}</h2></p>
                            <p class="single-item-price">
                                <span>{{number_format($products->price, 0, ',', '.')}} đồng</span>
                            </p>
                            <p class="single-item-price">@if($products->sex == 1)Giày Nam
                                @else Giày Nữ
                                @endif</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>
                        <div class="single-item-desc">
                            <p>{{$products->content}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <p>Tuỳ chọn:</p>
                        <div class="single-item-options">
                            <select class="wc-select">
                                <option>Kích cỡ</option>
                                @foreach($size as $key => $value)
                                    <option>{{$value}}</option>
                                @endforeach
                            </select>
                            <select class="wc-select" name="ProductColor" >
                                <option>Màu</option>
                                @foreach($color as $key => $value)
                                    <option>{{$value}}</option>
                                @endforeach
                            </select>
                            <select class="wc-select" name="ProductQuantity">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" onclick="alert('Thêm vào giỏ hàng thành công!')" href="#"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h2>Sản phẩm cùng nhóm</h2>
                    <div class="row">
                        <?php foreach ($groupProducts as $product): ?>
                        <div class="col-sm-3">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="{{route('details-product',$product->id)}}"><img style="border: solid 1px;" src="{!! asset('public/source/image/product/'.$product['image']) !!}" alt=""></a>
                                </div>
                                <div class="single-item-body" >
                                    <a href="{{route('details-product',$product->id)}}"> <h6 class="single-item-title">{{$product->name}}</h6></a>
s
                                    <p class="single-item-price" style="margin-bottom: 5px">
                                        <span>{{number_format($product->price)}} đồng</span>
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" onclick="alert('Thêm vào giỏ hàng thành công!')" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('details-product',$product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Có thể bạn thích</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($genderProducts as $product)
                            <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{route('details-product',$product->id)}}">
                                        <img style="border: solid 1px;" src="{!! asset('public/source/image/product/'.$product['image']) !!}" alt=""></a>
                                <div class="media-body">
                                    <a href="{{route('details-product',$product->id)}}" class="single-item-title">{{$product->name}}</a>
                                    <p>{{number_format($product->price)}} đồng</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($newProducts as $product)
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{route('details-product',$product->id)}}">
                                        <img style="border: solid 1px;" src="{!! asset('public/source/image/product/'.$product['image']) !!}" alt=""></a>
                                    <div class="media-body">
                                        <a href="{{route('details-product',$product->id)}}" class="single-item-title">{{$product->name}}</a>
                                        <p>{{number_format($product->price)}} đồng</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection