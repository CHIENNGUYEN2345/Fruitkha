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
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thuong hieu</label>
                                    <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thuong hieu</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" placeholder="mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <select name="brand_product_status" class="form-control input-sm m-bot15">
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