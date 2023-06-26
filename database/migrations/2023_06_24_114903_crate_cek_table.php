<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mahasiswa')->constrained('mahasiswa')->comment('relasi ke tabel mahasiswa');
            $table->foreignId('id_pertanyaan')->constrained('pertanyaans')->comment('relasi ke tabel pertanyaan');
            $table->foreignId('id_jawaban')->constrained('jawabans')->comment('relasi ke tabel jawaban');
            $table->foreignId('id_skor')->constrained('skors')->comment('relasi ke tabel skor')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
