<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\CatePost;
session_start();
class CategoryPost extends Controller
{
    //FRONTEND

    // public function show_category_home($category_id){
    //     $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
    //     $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
    //     $category_by_id = DB::table('tbl_product')
    //     ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
    //     ->where('tbl_product.category_id','=',$category_id)
    //     ->get();
    //     return view("pages.category.show_category")->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('all_product',$all_product)->with('category_by_id',$category_by_id);
    // }

    // public function show_details_product($product_id){
    //     $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
    //     $product_details = DB::table('tbl_product')
    //     ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    //     ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
    //     ->where('tbl_product.product_id',$product_id)->get();

    //     foreach($product_details as $key=>$value)
    //         $category_id = $value->category_id;
        
    //     $related_product = DB::table('tbl_product')
    //     ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    //     ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
    //     ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();
        
    //     return view('pages.sanpham.show_details')->with('catgory',$cate_product)->with('brand',$brand_product)->with('product_details',$product_details)->with('relate',$related_product);
    // }

    //BACKEND
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_post(){
        $this->AuthLogin();
        return view('admin.category_post.add_category_post');
    }

    public function all_category_post(){
        $this->AuthLogin();
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        return view('admin.category_post.list_category_post')->with(compact('category_post',$category_post));

    }

    public function save_category_post(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = new CatePost();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();

        Session::put('message','Thêm danh mục bài viết thành công!');
        
        return redirect()->back();
    }

    public function danh_muc_bai_viet($cate_post_slug){

    }

    // public function active_category_product($category_product_id){
    //     $this->AuthLogin();
    //     DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
    //     Session::put('message','Bo kích hoạt sản phẩm!');
    //     return Redirect::to('all-category-product');
    // }

    // public function unactive_category_product($category_product_id){
    //     $this->AuthLogin();
    //     DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
    //     Session::put('message','Kích hoạt sản phẩm thành công!');
    //     return Redirect::to('all-category-product');
    // }

    public function edit_category_post($category_post_id){
        $this->AuthLogin();
        $category_post = CatePost::find($category_post_id);
        return view('admin.category_post.edit_category_post')->with(compact('category_post'));
    }

    public function update_category_post(Request $request, $cate_id){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = CatePost::find($cate_id);
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::put('message','Cập nhật danh mục bài viết thành công!');
        return redirect()->back();
    }

    public function delete_category_post($cate_id){
        $this->AuthLogin();
        $category_post=CatePost::find($cate_id);
        $category_post->delete();
        Session::put('message','Xóa danh mục bài viết thành công!');
        return redirect()->back();
    }
}
