<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\export;
use App\Models\PengajuanMahasiswa;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exports\PengajuanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon; 

class MhsController extends Controller
{
    public function mhsDashboard(){
        $email = Auth::user()->email;
        $pengajuan = DB::select('select p.* from pengajuan_mahasiswa as p left join mahasiswa as m on m.id = p.id_mahasiswa where m.email ="'.$email.'"');
        $profile = DB::table('mahasiswa')->where('email', $email)->get();
        $validation = $this->validation();
        return view('user.profil', array('pengajuan' => $pengajuan, 'profile' => $profile, 'validation' => $validation)); 
    }

    public function export(){
        return Excel::download(new PengajuanExport, 'pengajuan.xlsx');
    }

    public function mhsDetail($id){
        $item = PengajuanMahasiswa::with('mahasiswa', 'jawaban_mahasiswa',  'jawaban_mahasiswa.pertanyaan', 'jawaban_mahasiswa.jawaban')->findOrFail($id);
        return view('user.detail', compact('item'));
    }

    public function validation(){
        $datenow = Carbon::now()->toDateString();
        $open = DB::table('accept_dates')
        ->whereRaw('? BETWEEN accept_since and accept_until', $datenow)
        ->first();
        if(!empty($open)){
            return $open;
        }else{
            return "Closed";
        }
    }
}
