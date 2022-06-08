@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
    </div>
    
    <div class="table-responsive">
      @php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            @endphp
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên khách hàng</th>
            <th>SDT</th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
            <td>{{$order_by_id->customer_name}}</td>
            <td>{{$order_by_id->customer_phone}}</td>
          </tr>
          
        </tbody>
      </table>
    </div>

  </div>
</div>
<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển
    </div>
    
    <div class="table-responsive">
      @php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            @endphp
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người vận chuyển</th>
            <th>Địa chỉ</th>
            <th>SDT</th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
            <td>{{$order_by_id->shipping_name}}</td>
            <td>{{$order_by_id->shipping_address}}</td>
            <td>{{$order_by_id->shipping_phone}}</td>
          </tr>
          
        </tbody>
      </table>
    </div>

  </div>
</div>
<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
    </div>
    
    <div class="table-responsive">
      @php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            @endphp
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sp</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Phí ship</th>
            <th>Khuyến mãi</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
           
            <td>{{$order_by_id->product_name}}</td>
            <td>{{$order_by_id->product_sales_quantity}}</td>
            <td>{{number_format($order_by_id->product_price).' '.'vnd'}}</td>
            <td>{{number_format($order_by_id->product_fee).' '.'vnd'}}</td>
            <td>{{$order_by_id->product_coupon}}</td>
            <td>{{number_format($order_by_id->order_total).' '.'vnd'}}</td>
          </tr>
          
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection