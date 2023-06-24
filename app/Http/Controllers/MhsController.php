<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MhsController extends Controller
{
    public function mhsDashboard(){
        $email = Auth::user()->email;
        $pengajuan = DB::select('select p.* from pengajuan_mahasiswa as p left join mahasiswa as m on m.id = p.id_mahasiswa where m.email ="'.$email.'"');
        $profile = DB::table('mahasiswa')->where('email', $email)->get();
        return view('user.profil', array('pengajuan' => $pengajuan, 'profile' => $profile)); 
    }
}
