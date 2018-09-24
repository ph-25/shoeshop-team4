@extends('master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
            <div class="banner" >
                <ul>
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                        <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined"
                             data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                             data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                             data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                            <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center"
                                 data-bgrepeat="no-repeat" data-lazydone="undefined"
                                 src="source/assets/images2/11.jpg" data-src="source/assets/images2/11.jpg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/assets/images2/11.jpg'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->

<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div>
                @if(Session::has('addcart'))
                <div class="alert alert-success">{{Session::get('addcart')}}<div class="pull-right"><a href="{{route('cart')}}">Xem giỏ hàng</a></div></div>
                @endif
            </div>
            <div class="space60">&nbsp;</div>

            <div class="row">

                </div>
                <div class="col-sm-12">

                    <div class="beta-products-list pull-left">
                        <a href="{{route('view-product')}}"> <h4 style="font-size: 200%">Sản phẩm mới</h4></a>
                            <div class="clearfix"></div>
                        <div class="row">
                            <?php foreach ($products as $product): ?>
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
                                        <a class="beta-btn primary" href="{{route('details-product',$product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div> <!-- .beta-products-list -->
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4 style="font-size: 200%">Được mua nhiều nhất</h4>
                        <div class="beta-products-details">
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <?php foreach ($bestSales as $product): ?>
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('details-product',$product->id)}}"><img style="border: solid 1px;" src="{!! asset('public/source/image/product/'.$product['image']) !!}" alt=""></a>
                                    </div>
                                    <div class="single-item-body" >
                                        <a href="{{route('details-product',$product->id)}}"> <h6 class="single-item-title">{{$product->name}}</h6></a>

                                            <p class="single-item-price" >
                                                <span>{{number_format($product->price, 0, ',', '.')}} đồng</span>
                                            </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{!! url('add-cart',[$product->id,$product->alias]) !!}">
                                            <i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('details-product',$product->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <div class="space40">&nbsp;</div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div>
@endsection