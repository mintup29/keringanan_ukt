<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skor extends Model
{
    protected $primarykey = 'id';
    protected $table = "skors";
    protected $fillable = ['skor'];

    /**
     * Get the jawaban that owns the Skor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jawaban(): BelongsTo
    {
        return $this->belongsTo(Jawaban::class);
    }

    /**
     * Get the pertanyaan that owns the Skor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pertanyaan(): BelongsTo
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    use HasFactory;
}