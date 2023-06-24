<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cek extends Model
{
    protected $table = 'cek';
    protected $fillable = [
        'id_mahasiswa', 'id_jawaban', 'id_pertanyaan', 'id_skor'
    ];
    
    use HasFactory;
}
