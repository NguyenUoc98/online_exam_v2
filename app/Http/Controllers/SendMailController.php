<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use App\Mail\SendMail;
use App\Mail\SendMailKetQua;

class SendMailController extends Controller
{

	public function getmail(){
		return view('trangchu.dangnhap');
	}
    function send(Request $request){
    	// $this->validate($request,
    	// 	[
    	// 		'name' => 'required',
    	// 		'email'=> 'required|email',
    	// 		'message'=>'required'
    	// 	],
    	// 	[
    	// 		'name.required' => 'Vui lòng nhập tên',
    	// 		'email.required'=> 'Vui lòng nhập email ',
    	// 		'email.email'=> 'Không đúng định dạng email',
    	// 		'message.required'=>'Vui lòng nhập nội dung'
    	// 	]);

        $input = $request->all();
       
        $mailable = new SendMail($input);
        Mail::to($input["email"])->send($mailable); 
        return redirect()->back();
    	 // return redirect("sendmail")->with('$input["email"]thongbao',"Gửi mail thành công!");
    }

   

    
}
