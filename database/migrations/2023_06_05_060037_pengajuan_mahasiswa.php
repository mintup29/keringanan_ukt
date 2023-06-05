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
            $table->timestamp('tgl_pengajuan');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->integer('semester');
            $table->integer('skor');
            $table->integer('status');
            $table->integer('skor_1');
            $table->integer('skor_2');
            $table->integer('skor_3');
            $table->integer('skor_4');
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
