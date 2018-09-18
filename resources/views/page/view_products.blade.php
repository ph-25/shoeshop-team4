@extends('master')
@section('content')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Sản  phẩm</h4>
                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <?php foreach ($products as $product): ?>
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <a href="{{route('details-product',$product->id)}}"><img style="border: solid 1px;" src="{!! asset('public/source/image/product/'.$product['image']) !!}" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <a href="{{route('details-product',$product->id)}}"> <h6 class="single-item-title">{{$product->name}}</h6></a>

                                            <p class="single-item-price">
                                                <span>{{$product->price}}</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href=""><i class="fa fa-shopping-cart"></i></a>
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