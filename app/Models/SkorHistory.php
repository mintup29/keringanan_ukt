<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorHistory extends Model
{
    protected $primarykey = 'id';
    protected $table = 'skor_historis';
    protected $fillable = ['id_old', 'skor_old', 'version'];

    use HasFactory;
}