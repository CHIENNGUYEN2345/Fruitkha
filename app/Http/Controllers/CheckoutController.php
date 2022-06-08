<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\City;
use App\Province;
use App\Wards;
use App\Fee;
use App\Order;
use App\OrderDetails;
use App\Shipping;
use App\CatePost;
use App\Post;
session_start();
class CheckoutController extends Controller
{
    public function checkout(){
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();
        return view('pages.checkout.checkout')->with('cate_post',$cate_post);
    }

    public function add_customer(Request $request){
        $data = array();
        
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_address']=$request->customer_address;
        $data['customer_phone']=$request->customer_phone;
        $customer_id=DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect('/confirm-customer');
    }

    public function login_checkout_post(Request $request){
        $data = array();
        
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_address']=$request->customer_address;
        $data['customer_phone']=$request->customer_phone;
        $customer_id=DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect('/home-login');
    }

    public function home_login(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();
        $post = Post::with('cate_post')->where('post_status',1)->take(3)->get();
        return view('pages.home')->with('brand_product',$brand_product)->with('cate_product',$cate_product)->with('all_product',$all_product)->with('cate_post',$cate_post)->with('post',$post);
    }

    public function confirm_customer(){
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();
        return view('pages.checkout.checkout_step_2')->with('cate_post',$cate_post);
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_phone']=$request->shipping_phone;
        $shipping_id=DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        // Session::put('customer_name',$request->customer_name);
        return Redirect('/payment');
    }

    public function logout_checkout(){
        Session::flush();
        return Redirect('/home');
    }

    public function payment(){
        $city = City::orderby('matp','ASC')->get();
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();
        return view('pages.checkout.payment')->with('city',$city)->with('cate_post',$cate_post);
    }

    public function order_place(Request $request){
        //
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();
        //insert into tbl_payment
        $data = array();
        
        $data['payment_method']=$request->payment_option;
        $data['payment_status']='Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);
        // Session::put('shipping_id',$shipping_id);
        // Session::put('customer_name',$request->customer_name);

        if(Session::get('cart')==true){
            $total=0;
            foreach(Session::get('cart') as $key=>$cart){
                $subtotal=$cart['product_price']*$cart['product_qty'];
                $total+=$subtotal;
                if(Session::get('fee')==true){
                    if(Session::get('coupon')==true){
                    foreach(Session::get('coupon') as $key=>$cou){
                        //coupon giam theo phan tram so tien ($cou['coupon_feature'] = 1)
                            if($cou['coupon_features']==1)
                            {
                                $total_coupon = ($total*$cou['coupon_percent_discount'])/100;
                                $last_total = $total-$total_coupon+Session::get('fee');
                            }elseif($cou['coupon_features']==2)
                            //coupon giam theo so tien ($cou['coupon_feature'] = 2)
                            {
                                $total_coupon = $total-$cou['coupon_percent_discount'];
                                $last_total = $total-$total_coupon+Session::get('fee');
                            }
                        }
                    }elseif(Session::get('coupon')!=true){
                        $last_total = $total+Session::get('fee');
                    }
                }elseif(Session::get('fee')!=true){
                    if(Session::get('coupon')==true){
                    foreach(Session::get('coupon') as $key=>$cou){
                        if($cou['coupon_features']==1)
                            {
                                $total_coupon = ($total*$cou['coupon_percent_discount'])/100;
                                $last_total = $total-$total_coupon+Session::get('fee');
                            }elseif($cou['coupon_features']==2)
                            {
                                $last_total_coupon = $total-$cou['coupon_percent_discount'];
                                $last_total = $total-$total_coupon+Session::get('fee');
                            }
                        }
                    }elseif(Session::get('coupon')!=true){
                        $last_total = $total+Session::get('fee');
                    }
                }
                
            }
        }


        //insert order
        $order_data = array();
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=$last_total;
        $order_data['order_status']='Dang cho xu ly';
        $order_data['created_at']=now();
        // $checkout_code = substr(md5(microtime()), rand(0,26),5);
        // $order_data['order_code']=$checkout_code;
        $order_id = DB::table('tbl_order')->insertGetId($order_data);


        //insert order_details
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key=>$val){
                $details_data = array();       
                $details_data['order_id']=$order_id;
                $details_data['product_id']=$val['product_id'];
                $details_data['product_name']= $val['product_name'];
                $details_data['product_price']=$val['product_price'];
                $details_data['product_sales_quantity']=$val['product_qty'];
                $details_data['product_fee']= $request->order_fee;
                $details_data['product_coupon']= Session::get('coupon') ? $request->order_coupon : 'Ko áp dụng';
                DB::table('tbl_order_details')->insert($details_data);
            }
        }

        
        if($data['payment_method']==1){
            Session::forget(['coupon','fee','cart']);
            return view('pages.checkout.success')->with('cate_post',$cate_post);
        }elseif($data['payment_method']==2){
            Session::forget(['coupon','fee','cart']);
            return view('pages.checkout.success')->with('cate_post',$cate_post);
        }

        

    }

    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=='city'){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();

                foreach($select_province as $key=>$province)
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
            }
        }
        echo $output;
    }

    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Fee::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->get();
            if($feeship){
                $count_fee = $feeship->count();
                if($count_fee>0){
                    foreach($feeship as $key=>$fee){
                    Session::put('fee',$fee->fee_feeship);
                    Session::save();
                    }
                }else{
                    Session::put('fee',10000);
                    Session::save();
                }
            }
            
        }
    }

    public function del_fee(){
        Session::forget('fee');
        return redirect()->back();
    }

    public function del_coupon_frontend(){
        Session::forget('coupon');
        return redirect()->back();
    }

    public function manage_order(){
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')
        ->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manager_order',$manager_order);
    }
    //----Coupon: truy cap file CouponController.php
    
    public function view_order($orderId){
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')
        ->where('tbl_order.order_id', $orderId)
        ->first();

        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
    }

    
}
