<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Validator;
use App\User;
use Hash;
use Auth;

class UserController extends Controller

{
	function __construct(){
		if(Auth::check()){
			view()->share('user',Auth::user());
		}
	}

    public function getuser(){
    	$user = User::all();
    	return view('admin.user.dsuser',['user'=>$user]);
    }

     public function getthemuser(){
        return view('admin.user.themuser');
    }

    public function postthemuser(Request $request){

        $this->validate($request,
            [
                'tenuser' => 'required|min:3|alpha',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|max:20',
                'quyen' => 'required'       
            ],
            [
                'tenuser.required'=> 'Bạn chưa nhập tên người dùng',
                'tenuser.min' => 'Tên người dùng ít nhất 3 kí tự',
                'tenuser.numeric' => 'Vui lòng nhập đúng ký tự chữ',
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Vui lòng nhập đúng định dạng email',
                 'email.unique'=>'Email đã tồn tại vui lòng nhập emil khác!',
                 'password.required'=>'Vui lòng nhập password',
                 
                 'password.min'=>'Password ít nhất 6 ký tự',
                 'password.max'=>'Password không quá 20 ký tự',

            ]);
        //sau khi bắt lỗi xong, lấy dlieu lưu vào trong model
        $user = new User;
        $user->name = $request->tenuser;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->quyen = $request->quyen;
        $user->save();
        //dẫn về trang 
        return redirect('admin/user/dsuser')->with('thongbao','Thêm thành công!');

    	
    }

    public function getsuauser($id){
        $user = User::find($id);
        return view('admin.user.suauser',['user'=>$user]);
    }

    public function postsuauser($id,Request $request){
        $user = User::find($id);
        $this->validate($request,
            [
                'tenuser' => 'required|min:3',
                'password' => 'required|min:6|max:20',
                'quyen' => 'required'       
            ],
            [
                'tenuser.required'=> 'Bạn chưa nhập tên người dùng',
                'tenuser.min' => 'Tên người dùng ít nhất 3 kí tự',
                
                 'password.required'=>'Vui lòng nhập password',
                 
                 'password.min'=>'Password ít nhất 6 ký tự',
                 'password.max'=>'Password không quá 20 ký tự',

            ]);
        //sau khi bắt lỗi xong, lấy dlieu lưu vào trong model
        $user->name = $request->tenuser;
        // $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->quyen = $request->quyen;
        $user->save();
        //dẫn về trang 
        return redirect('admin/user/dsuser')->with('thongbao','Sửa thành công!');
    }
    public function xoauser($id){
         User::destroy($id);
        return redirect('admin/user/dsuser')->with('thongbao','Bạn đã xóa thành công!');
    }
}
