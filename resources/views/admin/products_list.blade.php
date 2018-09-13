@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">

            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Danh sách sản phẩm</span>
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
                    <div class="col-sm-2">
                        <div class="space60">&nbsp;</div>
                        <ul class="aside-menu">
                            <?php foreach ($brand as $br): ?>
                            <li><a href="{{route('products-for-brand',$br->id)}}">{{$br->name}}</a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-sm-10">
                        <div class="beta-products-list">
                            <div class="pull-left">
                                <h4>Danh sách sản phẩm</h4>
                            </div>
                            <div class="pull-right">
                                <a class="form-control" style="text-align: center; background-color: #5c92cf; color: yellow; padding:5px 3px 5px 3px" href="{{route('create-product')}}">Thêm sản phẩm mới</a>
                            </div>
                            <div class="clearfix"></div>
                            <div style="padding-bottom: 20px">
                                @if(Session::has('update'))
                                  <div class="alert alert-success">{{Session::get('update')}}</div>
                                @elseif(Session::has('delete'))
                                  <div class="alert alert-success">{{Session::get('delete')}}</div>
                                @elseif(Session::has('add'))
                                  <div class="alert alert-success">{{Session::get('add')}}</div>
                                @endif
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr align="center">
                                        <th style="text-align: center">ID</th>
                                        <th class="col-sm-2" style="text-align: center">Tên Sản Phẩm</th>
                                        <th style="text-align: center">Giá</th>
                                        {{--<th class="col-sm-2">Mô Tả</th>--}}
                                        <th class="col-sm-1" style="text-align: center">Hình Ảnh</th>
                                        <th style="text-align: center">Màu sản phẩm</th>
                                        {{--<th>Loại Giày</th>--}}
                                        <th class="col-sm-1" style="text-align: center">Kích Cỡ</th>
                                        <th style="text-align: center">Giới Tính</th>
                                        <th style="text-align: center">Số Lượng (đôi)</th>
                                        <th style="text-align: center">Delete</th>
                                        <th style="text-align: center">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                    <tr class="odd gradeX" align="center">
                                        <td style="text-align: center">{{$product->id}}</td>
                                        <td><a href="{{route('details-product',$product->id)}}">{{$product->name}}</a></td>
                                        <td style="text-align: center">{{number_format($product->price, 0, ',', '.')}} đồng</td>
                                        {{--<td>{{substr($product->content,0,50)}}...</td>--}}
                                        <td style="text-align: center">
                                            <img src="{!! asset('public/source/image/product/'.$product['image']) !!}" alt="{{$product->name}}" width="90px" height="90px">
                                        </td>
                                        <td style="text-align: center">{{$product->color}}</td>
                                        {{--<td>{{$product->brand->name}}</td>--}}
                                        <td style="text-align: center">{{$product->size}}</td>
                                        <td style="text-align: center">
                                            @if($product->sex == 1)  Nam
                                                @else  Nữ
                                            @endif
                                        </td>
                                        <td style="text-align: center">{{$product->quantity}}</td>
                                        <td class="center" style="text-align: center"><i class="fa fa-trash-o fa-fw"></i>
                                            <a  href="{{route('delete-product',$product->id)}}" onclick="return confirmDelect()"> Delete</a></td>
                                        <td class="center" style="text-align: center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('edit-product',$product->id)}}">Edit</a></td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            {!! $products->links() !!}
                        </div>
                        <div class="space50">&nbsp;</div>
                    </div>
                </div> <!-- end section with sidebar and main content -->
            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
    </div>
@endsection
