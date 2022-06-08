@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM MÃ GIẢM GIÁ
                        </header>
                        <div class="panel-body">
                            @php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert" style="color: red;">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            @endphp
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/insert-coupon-post')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã code giảm giá</label>
                                    <input type="text" name="coupon_code" class="fo_rm-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng mã</label>
                                    <input type="text" name="coupon_times" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Tính năng chính của mã</label>
                                    <select name="coupon_features" class="form-control input-sm m-bot15">
                                        <option value="0">------Chọn------</option>
                                        <option value="1">Giảm theo %</option>
                                        <option value="2">Giảm theo tiền</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nhập số phần trăm hoặc tiền giảm</label>
                                    <input type="text" name="coupon_percent_discount" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                
                                <button type="submit" class="btn btn-info add_coupon">Thêm mã</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection