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
        <div>
            @if(Session::has('addcart'))
                <div class="alert alert-success">{{Session::get('addcart')}} <div class="pull-right"><a href="{{route('cart')}}">Xem giỏ hàng</a></div></div>

            @endif
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-4">
                        <img style="border: solid 1px;" src="{!! asset('public/source/image/product/'.$products['image']) !!}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h2>{{substr($products->name,0,20)}}</h2></p>
                            <p class="single-item-price">
                                <span>{{number_format($products->price, 0, ',', '.')}} đồng</span>
                            </p>
                            <p class="single-item-price">@if($products->sex == 1)Giày Nam
                                @else Giày Nữ
                                @endif</p>
                        </div>
                        <div class="pull-left" style="margin-right: 100px;">
                            <label>Kích cỡ: &nbsp;</label>
                            @foreach ($size as $key)
                                @foreach(SIZES as $sizeKey => $sizeName)
                                    @if($key == $sizeKey ){{$sizeName}}&nbsp;
                                    @endif
                                @endforeach
                            @endforeach
                        </div>

                        <div class="pull-left">
                            <label>Màu:&nbsp;</label>
                            @foreach($color as $key => $value)
                                @if(($value == "Đỏ")||($value == 5))
                                    <a style="border: solid 1px black; background-color: red;" href="">&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                @elseif(($value == "Đen")||($value == 0))
                                    <a style="border: solid 1px black; background-color: black;" href="">&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                @elseif(($value === "Trắng")||($value == 1))
                                    <a style="border: solid 1px black; background-color: white;" href="">&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                @elseif(($value === "Xanh")||($value == 2))
                                    <a style="border: solid 1px black; background-color: blue;" href="">&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                @elseif(($value === "Nâu")||($value == 3))
                                    <a style="border: solid 1px black; background-color: brown;" href="">&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                @elseif(($value === "Xám")||($value == 4))
                                    <a style="border: solid 1px black; background-color: grey;" href="">&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;
                                @endif
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>
                        <div class="single-item-desc">
                            <p>{{$products->content}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <div class="single-item-options" >
                            <div class="single-item">
                            <a class="add-to-cart" href="{!! url('add-cart',[$products->id,$products->alias]) !!}"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space100">&nbsp;</div>
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
                                    <p class="single-item-price" style="margin-bottom: 5px">
                                        <span>{{number_format($product->price,0,',','.')}} đồng</span>
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{!! url('add-cart',[$product->id,$product->alias]) !!}">
                                        <i class="fa fa-shopping-cart"></i></a>
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
                    <h3 class="widget-title ;font-size: 200%">Có thể bạn thích</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($genderProducts as $product)
                            <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{route('details-product',$product->id)}}">
                                        <img style="border: solid 1px;" src="{!! asset('public/source/image/product/'.$product['image']) !!}" alt=""></a>
                                <div class="media-body">
                                    <a href="{{route('details-product',$product->id)}}" class="single-item-title">{{$product->name}}</a>
                                    <p>{{number_format($product->price,0,',','.')}} đồng</p>
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
                                        <p>{{number_format($product->price,0,',','.')}} đồng</p>
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