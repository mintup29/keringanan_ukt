<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanMahasiswa extends Model
{
    public function jawaban_mahasiswa()
    {
        return $this->belongsTo(PengajuanMahasiswa::class, 'id_pengajuan_mhs');
    }
    
    use HasFactory;
}
