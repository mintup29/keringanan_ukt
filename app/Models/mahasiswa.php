<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primarykey = 'id';
    protected $table = 'mahasiswa';
    protected $fillable = [
      'nim','nama'
    ];

    // public function jawaban_mahasiswa()
    // {
    //     return $this->hasMany(JawabanMahasiswa::class, 'id_mahasiswa');
    // }

    // public function pengajuan_mahasiswa()
    // {
    //     return $this->hasMany(PengajuanMahasiswa::class, 'id_mahasiswa');
    // }
    
    // public function pengajuan_mahasiswa(): HasMany
    // {
    //     return $this->hasMany(PengajuanMahasiswa::class);
    // }

    // public function jawaban_mahasiswa(): HasMany
    // {
    //     return $this->hasMany(JawabanMahasiswa::class);
    // }


    use HasFactory;
}
