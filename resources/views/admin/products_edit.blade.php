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
                    <div class="col-sm-3"> </div>
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
                                                <li>{{$err}}</li>
                                            @endforeach
                                        </div>
                                    @endif
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Tên Sản Phẩm<label style="color: red;font-size: 150%">*</label>:</label>
                                        <input class="form-control" name="ProductName"
                                               value="{{old('ProductName', $products->name)}}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm (VNĐ)<label style="color: red;font-size: 150%">*</label>:</label>
                                        <input class="form-control" name="ProductPrice"
                                               value="{{old('ProductPrice',$products->price)}}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô Tả<label style="color: red;font-size: 150%">*</label>:</label>
                                        <textarea class="form-control" rows="10" placeholder="Mô tả sản phẩm"  name="ProductContent" required>{{old('ProductContent',$products->content)}}</textarea>
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
                                        <select class="form-control" name="BrandName" required>
                                            <option value="{{$products->brand_id}}">{{$products->brand->name}}</option>
                                            <option>Chọn loại sản phẩm</option>
                                            <?php foreach ($brand as $br) :?>
                                            <option  value="{{$br->id}}">{{$br->name}}</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm cho:</label>
                                        @if($products->sex === 1)
                                        <input type="radio" id="nam" checked="checked"  name="ProductSex"  style="margin-left: 100px; margin-right: 10px;" value="{{$products->sex}}"/>
                                            <label for="nam" style="font-weight: bold">Nam</label>
                                        <input type="radio" id="nu"   name="ProductSex"  style="margin-left: 100px; margin-right: 10px;" value="{{$products->sex}}"/>
                                            <label for="nu" style="font-weight: bold">Nữ</label>
                                        @elseif($products->sex === 0)
                                        <input type="radio" id="nam"  name="ProductSex"  style="margin-left: 100px; margin-right: 10px;" value="1"/>
                                            <label for="nam" style="font-weight: bold">Nam</label>
                                        <input type="radio" id="nu"   name="ProductSex" checked="checked" style="margin-left: 100px; margin-right: 10px;" value="0"/>
                                            <label for="nu" style="font-weight: bold">Nữ</label>
                                        @endif
                                    </div>
                                    <div class="pull-left">
                                        <label style="padding-right:52px">Màu sản phẩm<label style="color: red;font-size: 150%">*</label>:</label> <br>
                                        <select   id="example-multiple-selected" multiple="multiple" name="ProductColor[]" required>
                                            <option value="Đen">Đen</option>
                                            <option value="Đỏ">Đỏ</option>
                                            <option value="Trắng">Trắng</option>
                                            <option value="Xanh">Xanh</option>
                                            <option value="Nâu">Nâu</option>
                                            <option value="Xám">Xám</option>
                                        </select>
                                    </div>

                                    <div class="pull-left">
                                        <label>Kích cỡ của sản phẩm<label style="color: red;font-size: 150%">*</label>:</label> <br>
                                        <select id="example-multiple-selected-2" multiple="multiple" name="ProductSize[]" required>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                        </select>
                                    </div>
                                    <div class="pull-right">
                                        <label>Số lượng (đôi)<label style="color: red;font-size: 150%">*</label>:</label><br>
                                        <input class="form-control" value="{{old('ProductQuantity',$products->quantity)}}" name="ProductQuantity" style="width: 100px" required/>
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

