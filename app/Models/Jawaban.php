<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jawaban extends Model
{
    protected $primarykey = 'id';
    protected $table = 'jawabans';
    protected $fillable = [
        'pertanyaan_id',
        'jawaban',
        'version'
    ];
    /**
     * Get the pertanyaan that owns the Jawaban
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pertanyaan(): BelongsTo
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    /**
     * Get the skor associated with the Jawaban
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function skor(): HasOne
    {
        return $this->hasOne(Skor::class);
    }


    public function jawaban_mahasiswa()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }

    use HasFactory;
}