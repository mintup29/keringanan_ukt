<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanHistory extends Model
{
    protected $primarykey = 'id';
    protected $table = 'pertanyaan_historis';
    protected $fillable = ['id_old', 'pertanyaan_old', 'version'];

    use HasFactory;
}