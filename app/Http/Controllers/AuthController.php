<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\mahasiswa;

class AuthController extends Controller
{
    public function login(){
        return view('auth.sso');
    }
    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)){
            if(Auth::user()->user_type == 'Admin'){
                return redirect()->route('dashboard');
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

    public function register(){
        return view('auth.register');
    }

    public function registerPost(Request $request){
        $id = DB::table('users')->InsertGetId([
            'name'  => $request->nama,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'user_type'=> "User"
        ]);
        $nim = strtoupper($request->nim);
        if(substr($nim,0,3) == "M05"){
            $prodi = "Informatika";
        }elseif(substr($nim,0,3) == "M05"){
            $prodi = "Informatika Juga";
        }else{
            $prodi = "Bukan Informatika";
        }

        $mhs = new mahasiswa();
        $mhs->id_user  = $id;
        $mhs->nim      = $nim;
        $mhs->nama     = $request->nama;
        $mhs->prodi    = $prodi;
        $mhs->semester  = $request->angkatan;
        $mhs->email    = $request->email;
        $mhs->save();

        return redirect()->route('login');
    }
}
