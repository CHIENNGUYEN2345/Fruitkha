<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\CatePost;
session_start();
class CartController extends Controller
{
    public function gio_hang(){
        $cate_post = CatePost::orderby('cate_post_id','DESC')->get();
        return view('pages.cart.gio_hang')->with('cate_post',$cate_post);
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');//kiem tra xem ton tai session cart chua
        if($cart==true){
            $is_available = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_available++;
                    //
                     $cart[$key] = array(
                    'session_id' => $val['session_id'],
                    'product_name' => $val['product_name'],
                    'product_id' => $val['product_id'],
                    'product_image' => $val['product_image'],
                    'product_qty' => $val['product_qty']+ $data['cart_product_qty'],
                    'product_price' => $val['product_price'],
                    'product_qty_real' => $val['product_qty_real']
                    );
                    Session::put('cart',$cart);
                    //(end)
                }
            }
            if($is_available == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_qty' => $data['cart_product_qty'],
                'product_qty_real' => $data['cart_product_qty_real']
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_qty' => $data['cart_product_qty'],
                'product_qty_real' => $data['cart_product_qty_real']
            );
        }
        Session::put('cart',$cart);
        Session::save();
    }

    public function delete_product($session_id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key=>$val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xoa san pham thanh cong!!');
        }else{
            return redirect()->back()->with('message','Xoa san pham that bai!!');
        }
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
    }

    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            $message = '';
            foreach($data['cart_qty'] as $key=>$qty){
                foreach($cart as $session=>$val){
                    //check tr?????ng h???p s??? l?????ng h??ng mu???n ?????t l???n h??n s??? h??ng trong kho -> ko cho c???p nh???t s??? l?????ng ???? & ????a ra th??ng b??o.
                    if($val['session_id']==$key && $qty<=$cart[$session]['product_qty_real']){
                        $cart[$session]['product_qty'] = $qty;
                        $message.='C???p nh???t s??? l?????ng '.$cart[$session]['product_name'].' th??nh c??ng<br/>';
                    }elseif($val['session_id']==$key && $qty>$cart[$session]['product_qty_real']){
                        $message.='C???p nh???t s??? l?????ng '.$cart[$session]['product_name'].' th???t b???i<br/>';
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message',$message);
        }else{
            return redirect()->back()->with('message','Cap nhat so luong that bai');
        }
    }

    public function delete_all_product(){
        $cart = Session::get('cart');
        if($cart==true){
            //Session::destroy();//destroy se huy het tat ca cac session, ke ca dang nhap
            Session::forget('cart');
            return redirect()->back()->with('message','C???p nh???t s??? l?????ng th??nh c??ng!');
        }
    }

    //check coupon
    public function check_coupon(Request $request){
        $data = $request->all();
        print_r($data);
    }
}
