<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('admin.auth.login',[
            'title'=>'Login'
        ]);
    }
    public function login(LoginRequest $request){
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            return redirect('/admin/home');
        }else{
        // session()->flash('errors', 'Tài khoản mật khẩu không chính xác');
            return redirect()->route('login')->withErrors([
                'email' => 'Tài khoản và mật khẩu không chính xác',
            ]);;
        }
    }
}
