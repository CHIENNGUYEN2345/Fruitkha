@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM DANH MỤC BÀI VIẾT
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
                                <form role="form" action="{{URL::to('/save-category-post')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="cate_post_name" class="form-control" placeholder="tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Slug</label>
                                    <input type="text" class="form-control" name="cate_post_slug" placeholder="mô tả danh mục">
                                </div>
                                
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <select name="cate_post_status" class="form-control input-sm m-bot15">
                                        
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_post_cate" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection