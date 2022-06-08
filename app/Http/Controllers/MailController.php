<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\CatePost;
use App\Post;
use Mail;
session_start();
class MailController extends Controller
{
    public function send_mail(){
        //send mail
            $to_name = "Chiến";
            $to_email = "huuchiennp24@gmail.com";//send to this email
        
            $data = array("name"=>"Mail từ tài khoản KH","body"=>"Mail gửi về vấn đề hàng hóa"); //body of mail.blade.php
        
                Mail::send('pages.mail.send_mail',$data,function($message) use ($to_name,$to_email){
                $message->to($to_email)->subject('test mail nhé');//send this mail with subject
                $message->from($to_email,$to_name);//send from this mail
                });
            return redirect('/')->with('message','');

    }

    public function quen_mat_khau(){
        
        return view('admin.password.forget_password');
        
    }

    public function recover_pass(Request $request){
        $data = $request->all();
        
    }
}
