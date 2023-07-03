<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanHistory extends Model
{
    protected $primarykey = 'id';
    protected $table = 'jawaban_historis';
    protected $fillable = ['id_old', 'jawaban_old', 'version'];

    use HasFactory;
}