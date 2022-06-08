<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\CatePost;
use App\Post;
session_start();
//trang chu hien thi cua website nay
class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();
        foreach($cate_post as $key=>$cate){
            //seo
            $meta_desc = $cate->cate_post_desc;
            $meta_keywords = $cate->cate_post_slug;
            $meta_title = $cate->cate_post_name;
            $cate_id = $cate->cate_post_id;

        }
        // return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product);
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')
        // ->get();
        // $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        $post = Post::with('cate_post')->where('post_status',1)->take(3)->get();
        return view('pages.home')->with('brand_product',$brand_product)->with('cate_product',$cate_product)->with('all_product',$all_product)->with('cate_post',$cate_post)->with('post',$post);
    }

    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.timkiem.search')->with('keywords',$keywords)->with('brand_product',$brand_product)->with('cate_product',$cate_product)->with('all_product',$all_product)->with('cate_post',$cate_post)->with('search_product',$search_product);
    }
}
