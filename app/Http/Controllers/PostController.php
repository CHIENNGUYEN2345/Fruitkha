<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Post;
use App\CatePost;
session_start();
class PostController extends Controller
{
    //BACKEND-------
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_post(){
        $this->AuthLogin();
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();

        return view('admin.post.add_post')->with(compact('cate_post'));
    }

    public function all_post(){
        $this->AuthLogin();
        $all_post = Post::orderby('post_id')->paginate(10);
        return view('admin.post.all_post')->with(compact('all_post',$all_post));
    }

    public function save_post(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $post = new Post();

        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_meta_keywords = $data['post_meta_keywords'];
        $post->cate_post_id = $data['cate_post_id'];
        $post->post_status = $data['post_status'];
        
        
        //neu nguoi dung co upload file anh (product_image) len -> lay thong tin nguoi dung
        $get_image = $request->file('post_image');
        if($get_image){
            $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $post->post_image = $new_image;
            $post->save();
            Session::put('message','Thêm post thành công!');
            return redirect()->back();
        }else{
            Session::put('message','Làm ơn thêm hình ảnh!');
            return redirect()->back();
        }
    }

    // public function active_product($product_id){
    //     $this->AuthLogin();
    //     DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
    //     Session::put('message','Bo kích hoạt sản phẩm!');
    //     return Redirect::to('all-product');
    // }

    // public function unactive_product($product_id){
    //     $this->AuthLogin();
    //     DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
    //     Session::put('message','Kích hoạt sản phẩm thành công!');
    //     return Redirect::to('all-product');
    // }

    public function edit_post($post_id){
        $this->AuthLogin();
        $cate_post = CatePost::orderby('cate_post_id')->get();
        $post = Post::find($post_id);
        return view('admin.post.edit_post')->with(compact('post','cate_post'));
    }

    public function update_post(Request $request,$post_id){
        $this->AuthLogin();
        $data = $request->all();
        $post = Post::find($post_id);

        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_meta_keywords = $data['post_meta_keywords'];
        $post->cate_post_id = $data['cate_post_id'];
        $post->post_status = $data['post_status'];
        
        
        //neu nguoi dung co upload file anh (product_image) len -> lay thong tin nguoi dung
        $get_image = $request->file('post_image');
        if($get_image){
            //xoa anh cu
            $post_image_old = $post->post_image;
            $path = 'public/uploads/post/'.$post_image_old;
            unlink($path);
            //cap nhat anh moi
            $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $post->post_image = $new_image;
            
        }
        $post->save();
        Session::put('message','Update post thành công!');
        return redirect()->back();
    }

    public function delete_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;

        //Xóa bài viết sẽ xóa cả hình ảnh:
        if($post_image){
            $path = 'public/uploads/post/'.$post_image;
            unlink($path);
        }

        $post->delete();
        Session::put('message','Xoa bài thành công!');
        return redirect()->back();
    }

    //------------------------------------FRONTEND-------------
    public function danh_muc_bai_viet($post_slug,Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();

        $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();
        foreach($catepost as $key=>$cate){
            //seo
            $meta_desc = $cate->cate_post_desc;
            $meta_keywords = $cate->cate_post_slug;
            $meta_title = $cate->cate_post_name;
            $cate_id = $cate->cate_post_id;

        }

        //cate_post: Eloquen Rela
        $post = Post::with('cate_post')->where('post_status',1)->where('cate_post_id',$cate_id)->paginate(10);

        return view('pages.post.danhmucbaiviet')->with('brand_product',$brand_product)->with('cate_product',$cate_product)->with('all_product',$all_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('cate_post',$cate_post)->with('post',$post);
    }

    public function bai_viet(Request $request,$post_slug){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();

        //cate_post: Eloquen Rela
        $post = Post::with('cate_post')->where('post_status',1)->where('post_slug',$post_slug)->take(1)->get();
        
        foreach($post as $key=>$p){
            //seo
            $meta_desc = $p->post_meta_desc;
            $meta_keywords = $p->post_meta_keywords;
            $meta_title = $p->post_title;
            $cate_id = $p->cate_post_id;
            $cate_post_id=$p->cate_post_id;

        }

        $related = Post::with('cate_post')->where('post_status',1)->where('cate_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->take(5)->get();

        return view('pages.post.baiviet')->with('brand_product',$brand_product)->with('cate_product',$cate_product)->with('all_product',$all_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('cate_post',$cate_post)->with('post',$post)->with('related',$related);
    }

    public function all_news(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();

        
        foreach($cate_post as $key=>$cate){
            //seo
            $meta_desc = $cate->cate_post_desc;
            $meta_keywords = $cate->cate_post_slug;
            $meta_title = $cate->cate_post_name;
            $cate_id = $cate->cate_post_id;

        }

        //cate_post: Eloquen Rela
        $post = Post::with('cate_post')->where('post_status',1)->take(9)->get();

        return view('pages.post.all_news')->with('brand_product',$brand_product)->with('cate_product',$cate_product)->with('all_product',$all_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('cate_post',$cate_post)->with('post',$post);
    }
}
