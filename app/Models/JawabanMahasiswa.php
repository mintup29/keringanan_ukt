<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanMahasiswa extends Model
{
    protected $fillable = [
      'id_mahasiswa', 'id_pertanyaan', 'id_jawaban', 'id_skor'
    ];

    public function jawaban_mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
    
    use HasFactory;
}
