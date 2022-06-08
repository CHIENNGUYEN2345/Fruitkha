<!-- Quan ly phi ship -->
@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM PHÍ VẬN CHUYỂN
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
                                <form>
                                    @csrf
                                <div class="form-group">
                                    <label>Chọn thành phố</label>
                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                        <option value="0">-------Chọn tỉnh thành----------</option>
                                        @foreach($city as $key=>$ci)
                                        	<option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Chọn quận huyện</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                        <option value="0">-------Chọn quận huyện----------</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phí vận chuyển</label>
                                    <input type="text" name="fee_ship" class="form-control fee-class" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm phí vận chuyển</button>
                            </form>
                            </div>

                            <div id="load-delivery">
                            </div>
                        </div>
                    </section>

            </div>
            
        </div>
@endsection