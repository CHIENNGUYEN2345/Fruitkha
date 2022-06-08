@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Hiển thị sản phẩm
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
            <th>Tên danh mục</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_category_product as $key=>$cate)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$cate->category_name}}</td>
            <td><span class="text-ellipsis">
              <?php
                if($cate->category_status==0){
              ?>
                  <a href="{{URL::to('/active-category-product/'.$cate->category_id)}}"><span><i class="fa-custom fa fa-thumbs-up"></i></span></a>
              <?php
                }else{
              ?>
                  <a href="{{URL::to('/unactive-category-product/'.$cate->category_id)}}"><span><i class="fa-custom fa fa-thumbs-down"></i></span></a>
              <?php
                }
              ?>
            </span></td>
            
            <td>
              <a href="{{URL::to('/edit-category-product/'.$cate->category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a href="{{URL::to('/delete-category-product/'.$cate->category_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-times text-danger text"></i></a>
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