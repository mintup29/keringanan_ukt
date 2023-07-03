<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMahasiswa extends Model
{
    protected $table = 'pengajuan_mahasiswa';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_mahasiswa',
        'skor_total',
        'potongan',
        'status',
        'tahun',
        'semester'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function jawaban_mahasiswa()
    {
        return $this->hasMany(JawabanMahasiswa::class, 'id_pengajuan_mahasiswa');
    }

    public function foto()
    {
        return $this->hasMany(Foto::class, 'id_pengajuan');
    }

    // public function jawaban()
    // {
    //     return $this->belongsTo(Jawaban::class, 'id_jawaban');
    // }

    // public function pertanyaan()
    // {
    //     return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    // }




    // public function mahasiswa(): BelongsTo
    // {
    //     return $this->belongsTo(Mahasiswa::class);
    // }



    use HasFactory;
}