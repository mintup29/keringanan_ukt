<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanMahasiswa extends Model
{
    protected $primarykey = 'id';
    protected $table = 'jawaban_mahasiswa';

    // public function mahasiswa(): BelongsTo
    // {
    //     return $this->belongsTo(Mahasiswa::class);
    // }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
    
    use HasFactory;
}
