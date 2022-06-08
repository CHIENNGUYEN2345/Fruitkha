@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM THUONG HIEU SẢN PHẨM
                        </header>
                        <div class="panel-body">
                            @php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            @endphp
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên san pham</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="ten san pham">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hinh anh san pham</label>
                                    <input type="file" name="product_image" class="form-control">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng trong kho</label>
                                    <input type="text" name="product_quantity" class="form-control" id="exampleInputEmail1" placeholder="gia san pham">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Gia san pham</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="gia san pham">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mo ta san pham</label>
                                    <input type="text" name="product_desc" class="form-control" placeholder="Mo ta san pham">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Noi dung san pham</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content" placeholder="noi dung san pham"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Danh muc san pham</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key=>$cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Thuong hieu san pham</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key=>$brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Thêm thuong hieu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection