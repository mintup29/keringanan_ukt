<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMahasiswa extends Model
{
    protected $table = 'pengajuan_mahasiswa';
    protected $fillable = [
      'skor_total', 'status'
    ];
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    

    use HasFactory;
}