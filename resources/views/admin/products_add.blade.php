@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('list-product')}}">Danh sách sản phẩm</a> / <span>Thêm mới sản phẩm</span>
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
                    <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <div class="beta-products-list">
                                <h3 style="margin-bottom: 30px">Thêm sản phẩm</h3>
                                <div class="clearfix"></div>
                                    <div class="col-lg-7" style="padding-bottom:120px">
                                        <form  action="{{route('create-product')}}" enctype="multipart/form-data" method="POST" role="form">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            @if(count($errors)>0)
                                                <div class="alert alert-danger">
                                                    @foreach($errors->all() as $err)
                                                        <li>{{$err}}</li>
                                                    @endforeach
                                                </div>
                                            @endif
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Tên sản phẩm<label style="color: red;font-size: 150%">*</label>:</label>
                                                <input class="form-control" name="ProductName" placeholder="Tên Sản Phẩm"
                                                       value="{{ old('ProductName', isset($products->name) ? $products->ProductName : '') }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label >Giá sản phẩm (VNĐ)<label style="color: red;font-size: 150%">*</label>:</label>
                                                <input class="form-control" name="ProductPrice" placeholder="Giá sản phẩm (VD: 555000)"
                                                       value="{{ old('ProductPrice', isset($products->price) ? $products->ProductPrice : '')}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Mô tả sản phẩm<label style="color: red;font-size: 150%">*</label>:</label>
                                                <textarea class="form-control" rows="5" name="ProductContent"
                                                          placeholder="Mô tả sản phẩm" >{{old('ProductContent', isset($products->content) ? $products->ProductContent: '')}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Hình ảnh sản phẩm<label style="color: red;font-size: 150%">*</label>:</label>
                                                <input type="file"  name="ProductImage" />
                                            </div>
                                            <div class="form-group">
                                                <label>Loại sản phẩm<label style="color: red;font-size: 150%">*</label>:</label>
                                                <select class="form-control" name="BrandName" >
                                                    <option>Chọn loại sản phẩm</option>
                                                    <?php foreach ($brand as $brandKey => $brandName) :?>
                                                    <option value="{{$brandKey}}"
                                                    @if(old('BrandName') == $brandKey)
                                                        selected="selected"
                                                    @endif>{{$brandName}}</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Sản phẩm cho<label style="color: red;font-size: 150%">*</label>:</label>
                                                <input type="radio" id="nam"   name="ProductSex"  style="margin-left: 100px;margin-right: 10px;"
                                                       value="1" @if (old('ProductSex')==null)
                                                       @elseif(old('ProductSex') == 1) checked="checked" @endif/>
                                                <label for="nam" style="font-weight: bold">Nam</label>
                                                <input type="radio" id="nu"  name="ProductSex"  style="margin-left: 100px;margin-right: 10px;"
                                                       value="0" @if (old('ProductSex')==null)
                                                       @elseif (old('ProductSex') == 0) checked="checked" @endif />
                                                <label for="nu" style="font-weight: bold">Nữ</label>
                                            </div>
                                            <div class="pull-left">
                                                <label style="padding-right:52px">Màu sản phẩm<label style="color: red;font-size: 150%">*</label>:</label> <br>
                                                <select  id="example-multiple-selected" multiple="multiple" name="ProductColor[]" >
                                                    <?php foreach (COLORS as $colorKey => $colorName) :?>
                                                    <option value="{{$colorKey}}"
                                                    @if (old("ProductColor")){{ (in_array($colorKey, old("ProductColor")) ? "selected":"") }}
                                                    @endif>{{$colorName}}</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="pull-left">
                                                <label>Kích cỡ của sản phẩm<label style="color: red;font-size: 150%">*</label>:</label> <br>
                                                <select id="example-multiple-selected-2" multiple="multiple" name="ProductSize[]" >
                                                    <?php foreach (SIZES as $sizeKey => $sizeName) :?>
                                                    <option value="{{$sizeKey}}"
                                                    @if (old("ProductSize")){{ (in_array($sizeKey, old("ProductSize")) ? "selected":"") }}@endif
                                                    >{{$sizeName}}</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="pull-right">
                                                <label>Số lượng (đôi)<label style="color: red;font-size: 150%">*</label>:</label><br>
                                                <input class="form-control" name="ProductQuantity" style="width: 100px"
                                                       value="{{ old('ProductQuantity', isset($products->quantity) ? $products->ProductQuantity : '')}}"/>
                                            </div>
                                            <div class="clearf ix"></div>
                                            <div style="padding-bottom: 100px"></div>
                                            <button type="submit" class="btn btn-default" style="width: 130px; margin-right: 60px; ">Thêm sản phẩm</button>
                                            <button type="reset" class="btn btn-default pull right" style="width: 120px;">Làm Mới</button>
                                        </form>
                                    </div>
                                <div class="space50">&nbsp;</div>
                            </div><!--end beta-products-list -->
                        </div>
                </div> <!-- end section with sidebar and main content -->
            </div> <!-- .main-content -->
         </div> <!-- #content -->
    </div> <!-- .container -->

@endsection


