<?php

namespace App\Http\Controllers;
use App\Models\PengajuanMahasiswa;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataCount = PengajuanMahasiswa::count();
        $dataNA = PengajuanMahasiswa::where('Status', 'Need Action')->count();
        $dataAccepted = PengajuanMahasiswa::where('Status', 'Accepted')->count();
        $dataRejected = PengajuanMahasiswa::where('Status', 'Rejected')->count();

        return view('admin.dashboard', compact('dataCount', 'dataNA', 'dataAccepted', 'dataRejected'));
    }
}
