<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mahasiswa')->constrained('mahasiswa')->comment('relasi ke tabel mahasiswa');
            // $table->foreignId('id_pertanyaan')->constrained('pertanyaans')->comment('relasi ke tabel pertanyaan');
            // $table->foreignId('id_jawaban')->constrained('jawabans')->comment('relasi ke tabel jawaban');
            $table->string('status');
            $table->integer('skor_total');
            $table->string('potongan');
            $table->string('semester');
            $table->integer('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_mahasiswa');
    }
};