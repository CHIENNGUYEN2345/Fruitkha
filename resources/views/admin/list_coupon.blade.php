@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH MÃ GIẢM GIÁ
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên mã giảm giá</th>
            <th>Mã code</th>
            <th>Số lượng mã</th>
            <th>Điều kiện giảm giá</th>
            <th>Được giảm</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key=>$cou)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$cou->coupon_name}}</td>
            <td>{{$cou->coupon_code}}</td>
            <td>{{$cou->coupon_times}}</td>
            <td><span class="text-ellipsis">
              <?php
                if($cou->coupon_features==1){
              ?>
                  Giảm theo %
              <?php
                }else{
              ?>
                  Giảm theo tiền
              <?php
                }
              ?>
            </span></td>
            <td><span class="text-ellipsis">
              <?php
                if($cou->coupon_features==1){
              ?>
                  Giảm {{$cou->coupon_percent_discount}} %
              <?php
                }else{
              ?>
                  Giảm {{$cou->coupon_percent_discount}}k
              <?php
                }
              ?>
            </span></td>
            
            <td>
              
              <a href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection