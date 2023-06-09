<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMahasiswa extends Model
{
    protected $table = 'pengajuan_mahasiswa';
    protected $primarykey = 'id';
    protected $fillable = [
      'skor_total', 'status', 'tahun', 'semester'
    ];
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    // public function jawaban_mahasiswa()
    // {
    //     return $this->hasMany(JawabanMahasiswa::class, 'id_mahasiswa');
    // }
    


    // public function mahasiswa(): BelongsTo
    // {
    //     return $this->belongsTo(Mahasiswa::class);
    // }

    

    use HasFactory;
}
