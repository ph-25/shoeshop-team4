@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                            <div class="pull-left">
                                <h4 style="font-size: 200%">Giỏ hàng</h4>
                            </div>
                            <div class="clearfix"></div>
                            <div style="padding-bottom: 20px"></div>
                            <form method="POST" action="{{route('cart.update')}}">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr align="center">
                                        <th class="col-sm-1" style="text-align: center">Xoá</th>
                                        <th class="col-sm-2" style="text-align: center">Hình Ảnh</th>
                                        <th class="col-sm-3" style="text-align: center">Tên Sản Phẩm</th>
                                        <th class="col-sm-2" style="text-align: center">Số lượng (đôi)</th>
                                        <th class="col-sm-2" style="text-align: center">Đơn giá</th>
                                        <th style="text-align: center">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($content as $item)
                                    <tr>
                                        <td style="text-align: center">
                                            <a href="{{route('del-pro-cart',['id'=>$item->rowId])}}">Xoá</a>
                                        </td>
                                        <td style="text-align: center"><img style="width: 50px; height: 50px;" src="{!! asset('public/source/image/product/'.$item->options->image) !!}" alt=""></td>
                                        <td><a href="{{route('details-product',$item->id)}}">{!! $item->name !!}</a></td>
                                        <td style="text-align: center">
                                            <input type="number" value="{!! $item->qty !!}" min="1" max="5" name="quantity[{!! $item->rowId !!}]" style="text-align: center; height: 30px; width: 50px">&nbsp;&nbsp;&nbsp;
                                            {{csrf_field()}}
                                            <button style="width: 30px" class="" type="submit"><img src="source\assets\dest\images\update1.jpg"></button>
                                        </td>
                                        <td style="text-align: center">{!!number_format($item->price,0,',','.') !!} đồng</td>

                                        <td style="text-align: center">{!!number_format((($item->price)*($item->qty)),0,',','.')!!} đồng</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <td class="cart-total" colspan="5" style="font-size: 200%; color: #ec971f;text-align: center;font-family: Baclieu">Tổng cộng</td>
                                    <td class="cart-total" style="font-size: 150%; color: #ec971f;text-align: center;font-family: Baclieu">{!! ($subtotal) !!} đồng</td>
                                </tr>
                            </table>
                            </form>
                        <input type="submit" class="btn btn-default pull right" value="Thanh toán" size="3">
                        <div class="space50">&nbsp;</div>
                    </div>
                </div> <!-- end section with sidebar and main content -->
            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection