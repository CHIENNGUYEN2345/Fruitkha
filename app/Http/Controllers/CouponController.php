<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Coupon;
session_start();
class CouponController extends Controller
{
    //---------Frontend--------
    public function check_coupon(Request $request){
        //y tuong la moi ma chi duoc chon 1 ma giam gia
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['check_coupon_input'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_available = 0;
                    if($is_available==0){
                        $cou[] = array(
                            'coupon_code'=>$coupon->coupon_code,
                            'coupon_features'=>$coupon->coupon_features,
                            'coupon_percent_discount'=>$coupon->coupon_percent_discount
                        );
                        Session::put('coupon',$cou);
                    }
                }else{ //neu chua co ma giam thi nhap ma moi
                    $cou[] = array(
                            'coupon_code'=>$coupon->coupon_code,
                            'coupon_features'=>$coupon->coupon_features,
                            'coupon_percent_discount'=>$coupon->coupon_percent_discount
                        );
                        Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công.');
            }   
        }else{
            return redirect()->back()->with('message','Mã không tồn tại. Bạn hãy nhập mã khác.');
        }
    }

    //----backend-----------
    public function insert_coupon(){
        return view('admin.insert_coupon');
    }
    public function insert_coupon_post(Request $request){
        $data = $request->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_times = $data['coupon_times'];
        $coupon->coupon_features = $data['coupon_features'];
        $coupon->coupon_percent_discount = $data['coupon_percent_discount'];
        $coupon->save();
        Session::put('message','thêm mã mới thành công!');
        return Redirect::to('list-coupon');//redirect to-> tra va route; //return view('...')->tra ve blade file

    }
    public function list_coupon(){
        $coupon = Coupon::orderBy('coupon_id','DESC')->get();
        return view('admin.list_coupon')->with(compact('coupon'));
    }
    public function delete_coupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        Session::put('message','Xóa mã giảm giá thành công!');
        return Redirect::to('list-coupon');
    }
}
