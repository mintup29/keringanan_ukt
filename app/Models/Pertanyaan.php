<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pertanyaan extends Model
{
    protected $primarykey = 'id';
    protected $table = 'pertanyaans';
    protected $fillable = ['pertanyaan'];

    /**
     * Get all of the jawaban for the Pertanyaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawaban(): HasMany
    {
        return $this->hasMany(Jawaban::class);
    }

    /**
     * Get all of the skor for the Pertanyaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skor(): HasMany
    {
        return $this->hasMany(Skor::class);
    }

    public function pertanyaan_mahasiswa()
    {
        return $this->hasMany(JawabanMahasiswa::class, 'id_pertanyaan');
    }

    use HasFactory;
}