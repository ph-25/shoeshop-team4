@extends('master')
@section('content')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4 style="font-size: 200%">Sản  phẩm {{$brand_type->name}}</h4>
                            <div>
                                @if(Session::has('addcart'))
                                    <div class="alert alert-success">{{Session::get('addcart')}}<div class="pull-right"><a href="{{route('cart')}}">Xem giỏ hàng</a></div></div>
                                @endif
                            </div>

                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <?php foreach ($products_type as $product): ?>
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{route('details-product',$product->id)}}"><img style="border: solid 1px;" src="{!! asset('public/source/image/product/'.$product['image']) !!}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <a href="{{route('details-product',$product->id)}}"> <h6 class="single-item-title">{{$product->name}}</h6></a>

                                            <p class="single-item-price" style="margin-bottom: 5px">
                                                <span>{{number_format($product->price,0,',','.')}} đồng</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{!! url('add-cart',[$product->id,$product->alias]) !!}"><i class="fa fa-shopping-cart"></i></a>

                                            <a class="beta-btn primary" style="margin-bottom: 30px" href="{{route('details-product',$product->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div> <!-- .beta-products-list -->
                        <div class="space50">&nbsp;</div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
        </div> <!-- .main-content -->
    </div> <!-- #content -->
@endsection