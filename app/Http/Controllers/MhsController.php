<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MhsController extends Controller
{
    public function mhsDashboard(){
        $nim_mhs = "M05XX000";
        $pengajuan = DB::select('select tgl_pengajuan, semester, status from pengajuan_mahasiswa where nim="'.$nim_mhs.'"');
        return view('user.profil',['pengajuan'=>$pengajuan]); 
    }
}
