<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\mahasiswa;

class AuthController extends Controller
{
    public function validation($id){
        $datenow = Carbon::now()->toDateString();
        $open = DB::table('accept_dates')
        ->whereRaw('? BETWEEN accept_since and accept_until', $datenow)
        ->first();
        
        if(!empty($open)){
            $done = DB::table('pengajuan_mahasiswa')
            ->select('pengajuan_mahasiswa.created_at')
            ->leftJoin('mahasiswa','pengajuan_mahasiswa.id_mahasiswa','mahasiswa.id')
            ->where('mahasiswa.id_user',$id)
            ->orderBy('pengajuan_mahasiswa.id', 'desc')
            ->first();
            $accept_since = Carbon::parse($open->accept_since);
            $accept_until = Carbon::parse($open->accept_until);
            if(empty($done)){
                    return "True";
                    //echo "Belum Pernah Mengajukan";
            }
            else{
                $submit = Carbon::parse($done->created_at);
                if($submit > $accept_since && $submit < $accept_until){
                    return "False";
                    //echo "Sudah Mengajukan";
                }else{
                    return "True";
                    //echo "Belum Mengajukan";
                } 
            }
        }else{
            return "False";
            //echo "Tidak Menerima Pengajuan";
        }
    }

    public function cek($id){
        echo $id;
    }

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
                $validation = $this->validation(Auth::id());
                if($validation == "True"){
                    return redirect()->route('kuesioner');
                }elseif($validation == "False"){
                    return redirect()->route('pengajuan');
                }
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
