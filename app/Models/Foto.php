<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'fotos';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_pengajuan',
        'foto'
    ];
    public function pengajuan()
    {
        return $this->belongsTo(PengajuanMahasiswa::class, 'id_pengajuan');
    }

    use HasFactory;
}