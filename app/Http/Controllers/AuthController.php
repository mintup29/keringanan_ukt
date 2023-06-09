<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth/sso');
    }
    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)){
            if(Auth::user()->user_type == 'Admin'){
                return redirect()->route('dashboard-admin.index');
            }else{
                return redirect()->route('kuesioner');
            }
        }else{
            return back()->with('error', 'login gagal');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
