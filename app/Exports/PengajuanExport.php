<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; 
use DB;

class PengajuanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('pengajuan_mahasiswa')
        ->select('id_mahasiswa', 'status', 'semester', 'tahun', 'updated_at')
        ->where('status','!=','Need Action')
        ->get();

    }

    public function headings(): array
    {
        return [
            'ID Mahasiswa',
            'Status',
            'Semester',
            'Tahun',
            'update terakhir'
        ];
    }
}
