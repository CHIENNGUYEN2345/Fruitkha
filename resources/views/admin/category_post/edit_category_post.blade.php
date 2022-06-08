@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CAP NHAT DANH MỤC bài viết
                        </header>
                        @php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            @endphp
                        <div class="panel-body">
                            

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-post/'.$category_post->cate_post_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$category_post->cate_post_name}}" name="cate_post_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" value="{{$category_post->cate_post_slug}}" name="cate_post_slug" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <select name="cate_post_status" class="form-control input-sm m-bot15">
                                        @if($category_post->cate_post_status==1)
                                        <option selected value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                         @else
                                        <option value="1">Hiện</option>
                                        <option selected value="0">Ẩn</option>
                                        @endif	
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>
                            
                        </div>
                    </section>

            </div>
            
        </div>
@endsection