<?php

namespace App\Http\Controllers;
use App\Models\PengajuanMahasiswa;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataCount = PengajuanMahasiswa::where('Status', 'Accepted')->count();

        return view('admin.dashboard', compact('dataCount'));
    }
}
