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
        Schema::create('pengajuan_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mahasiswa')->comment('relasi ke tabel mahasiswa');
            $table->timestamp('tgl_pengajuan')->nullable();
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->integer('skor');
            $table->string('status');
            $table->integer('skor_1');
            $table->integer('skor_2');
            $table->integer('skor_3');
            $table->integer('skor_4');

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
