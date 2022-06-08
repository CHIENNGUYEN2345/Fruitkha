<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }

    public function all_brand_product(){
        $this->AuthLogin();
        // $all_brand_product = DB::table('tbl_brand_product')->get();
        $all_brand_product = Brand::all();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }

    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data=$request->all();
        $brand=new Brand();
        $brand->brand_name = $data['brand_product_name'];
        // $brand->brand_slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request->brand_product_desc;
        // $data['brand_status'] = $request->brand_product_status;

        // DB::table('tbl_brand_product')->insert($data);
        Session::put('message','Thêm thành công!');
        return Redirect::to('add-brand-product');
    }

    public function active_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update(['brand_status'=>1]);
        Session::put('message','Bo kích hoạt sản phẩm!');
        return Redirect::to('all-brand-product');
    }

    public function unactive_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update(['brand_status'=>0]);
        Session::put('message','Kích hoạt sản phẩm thành công!');
        return Redirect::to('all-brand-product');
    }

    public function edit_brand_product($brand_id){
        $this->AuthLogin();
        $edit_brand_product = Brand::find($brand_id);
        // $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }

    public function update_brand_product(Request $request,$brand_id){
        $this->AuthLogin();

        $data =$request->all();

        $brand = Brand::find($brand_id);
       
        $brand->brand_name = $data['brand_product_name'];
        // $brand->brand_slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request->brand_product_desc;
        // DB::table('tbl_brand_product')->where('brand_id',$brand_id)->update($data);
        Session::put('message','cap nhat danh muc sản phẩm thành công!');
        return Redirect::to('all-brand-product');
    }

    public function delete_brand_product($brand_id){
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id',$brand_id)->delete();
        Session::put('message','Xoa danh muc sản phẩm thành công!');
        return Redirect::to('all-brand-product');
    }
}
