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
        Schema::create('jawaban_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengajuan_mhs')->constrained('pengajuan_mahasiswa')->comment('relasi ke tabel pengajuan_mahasiswa');
            $table->foreignId('id_pertanyaan')->constrained('pertanyaans')->comment('relasi ke tabel pertanyaan');
            $table->foreignId('id_jawaban')->constrained('jawabans')->comment('relasi ke tabel jawaban');
            $table->integer('skor_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_mahasiswa');
    }
};
