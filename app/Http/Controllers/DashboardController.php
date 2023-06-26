<?php

namespace App\Http\Controllers;
use App\Models\PengajuanMahasiswa;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $dataNA = PengajuanMahasiswa::where('Status', 'Need Action');
        $dataAccepted = PengajuanMahasiswa::where('Status', 'Accepted');
        $dataRejected = PengajuanMahasiswa::where('Status', 'Rejected');

        $selectedYear = request()->query('year');
        $dataCount = PengajuanMahasiswa::count();;
        

        if ($selectedYear) {
            $dataCount = PengajuanMahasiswa::whereYear('updated_at', $selectedYear)->count();
            $dataNA->whereYear('updated_at', $selectedYear);
            $dataAccepted->whereYear('updated_at', $selectedYear);
            $dataRejected->whereYear('updated_at', $selectedYear);
        }

        $dataNA = $dataNA->count();
        $dataAccepted = $dataAccepted->count();
        $dataRejected = $dataRejected->count();

        $years = DB::table('pengajuan_mahasiswa')
            ->select(DB::raw('YEAR(updated_at) as year'))
            ->distinct()
            ->pluck('year');

        return view('admin.dashboard', compact('dataCount', 'dataNA', 'dataAccepted', 'dataRejected', 'years', 'selectedYear'));
    }
}
