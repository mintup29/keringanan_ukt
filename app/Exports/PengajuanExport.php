<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings; 
use Maatwebsite\Excel\Concerns\WithStyles;
use Illuminate\Support\Carbon; 

use DB;

class PengajuanExport implements FromCollection, ShouldAutoSize, WithHeadings, WithStyles
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

    public function styles(Worksheet $sheet)
    {   $num = DB::table('pengajuan_mahasiswa')->where('status','!=','Need Action')->count();
        $num = $num+2;
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $end = 'E'.$num;

        $styleArray = array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            ),
        );
        $sheet = $sheet ->getStyle('A2:'.$end)->applyFromArray($styleArray);
    }

    public function headings(): array
    {
        return [
            ['Export Data Pengajuan '.Auth::user()->name.' tanggal '.Carbon::now()->toDateString()],
            [
            'ID Mahasiswa',
            'Status',
            'Semester',
            'Tahun',
            'update terakhir']
        ];
    }
}
