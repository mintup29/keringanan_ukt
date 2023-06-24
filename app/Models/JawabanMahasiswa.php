<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanMahasiswa extends Model
{
    protected $primarykey = 'id';
    protected $table = 'jawaban_mahasiswa';
    protected $fillable = [
      'id_mahasiswa', 'id_pengajuan_mahasiswa', 'id_jawaban', 'id_pertanyaan', 'id_skor'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    
    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class, 'id_jawaban');
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }

    
    use HasFactory;
}