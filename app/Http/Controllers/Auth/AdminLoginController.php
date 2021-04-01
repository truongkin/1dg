<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AdminLoginController extends Controller
{
    //
    public function login(){
        return view('Backend.Auth.login');
    }
    public function postlogin(Request $request){
        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect('/admin/home');
        } else {
            return redirect()->back()->with('fail',"Đăng nhập thât");
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('loginadmin'));
    }
}
