<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthClientController extends Controller
{
    public function login(){
        return view('client.auth.login',[
            'title' => 'Đăng nhập',
            'genres' => Genre::all(),

        ]);
    }
    public function saveLogin(LoginRequest $request){
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            return redirect('/');
        }else{
        // session()->flash('errors', 'Tài khoản mật khẩu không chính xác');
            return redirect()->route('dang-nhap')->withErrors([
                'email' => 'Tài khoản và mật khẩu không chính xác',
            ]);;
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function register(){
        return view('client.auth.register',[
            'title'=>'Đăng ký',
            'genres' => Genre::all(),

        ]);
    }
    public function saveRegister(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required | unique:users',
            'number_phone' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'enter_password' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
            'email.required' => 'Vui lòng nhập email',
            'number_phone.required' => 'Vui lòng nhập số điện thoại',
            'gender.required' => 'Vui lòng nhập giới tính',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'enter_password.required' => 'Vui lòng nhập lại mật khẩu',
        ]);

        if($request->password == $request->enter_password){
            $user = new User();
            $user->role_id = 3;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->number_phone = $request->input('number_phone');
            $user->gender = $request->input('gender');
            $user->password = bcrypt($request->input('password'));
            $user->status =1;
            $user->save();

            return redirect()->back()->with('success', 'Đăng ký tài khoản thành công');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Mật khẩu không trùng khớp',
            ]);;
        }
    }




    public function detailUser(){
        return view('client.auth.detail',[
            'title' => 'Thông tin cá nhân',
            'users'=>Auth::user(),
            'genres'=>Genre::all()
        ]);
    }
}
