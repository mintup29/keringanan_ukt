<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMahasiswa extends Model
{
    protected $table = 'pengajuan_mahasiswa';
    protected $fillable = [
      'tgl_pengajuan', 'nim','nama_mahasiswa','skor', 'status'
    ];
    use HasFactory;
}
