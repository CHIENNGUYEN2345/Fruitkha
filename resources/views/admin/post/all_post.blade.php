@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết
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
            <th>Tên bài</th>
            <th>Ảnh</th>
            <th>Slug</th>
            <th>Tóm tắt</th>
            <th>Từ khóa bài viết</th>
            <th>Danh mục bài viết</th>
            <th>Hiện thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_post as $key=>$post)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$post->post_title}}</td>
            <td><img src="{{('public/uploads/post/'.$post->post_image)}}" height="100" width="100"></td>
            <td>{{$post->post_slug}}</td>
            <td>{!!$post->post_desc!!}</td>
            <td>{{$post->post_meta_keywords}}</td>
            <td>{{$post->cate_post_id}}</td>
            <td>
              @if($post->post_status==1)
                Hiển thị
              @else
                Ẩn
              @endif
            </td>
            
            <td>
              <a href="{{URL::to('/edit-post/'.$post->post_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <a href="{{URL::to('/delete-post/'.$post->post_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-times text-danger text"></i></a>
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
            {{$all_post->links()}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection