<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->text('pertanyaan');
            $table->integer('version');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        $createMultipleJawabans = [
            ['pertanyaan' => 'Berapa nominal UKT Anda?', 'version' => 1],
            ['pertanyaan' => 'Apakah orang tua (bapak dan ibu) Anda masih lengkap atau tidak?', 'version' => 1],
            ['pertanyaan' => 'Apakah pekerjaan orang tua Anda? Jika PNS, apa pangkat dan golongannya?', 'version' => 1],
            ['pertanyaan' => 'Apakah kedua orang tua bekerja?', 'version' => 1],
            ['pertanyaan' => 'Jika hanya salah satu, siapa yang bekerja?', 'version' => 1],
            ['pertanyaan' => 'Berapa total pendapatan orang tua (ayah + ibu) saat ini?', 'version' => 1],
            ['pertanyaan' => 'Berapa jumlah anak dalam keluarga Anda?', 'version' => 1],
            ['pertanyaan' => 'Anak keberapakah Anda?', 'version' => 1],
            ['pertanyaan' => 'Berapa jumlah anggota keluarga yang menjadi tanggungan orang tua saat ini?', 'version' => 1],
            ['pertanyaan' => 'Jelaskan status Saudara anda (menikah ataukah belum) dan jenjang pendidikan saudara anda yang menjadi tanggungan orang tua?', 'version' => 1],
            ['pertanyaan' => 'Status kepemilikan rumah', 'version' => 1],
            ['pertanyaan' => 'Deskripsikan kondisi rumah Saudara (misal tembok permanen/semi permanen, lantai keramik/tidak, Luas tanah/bangunan)', 'version' => 1],
            ['pertanyaan' => 'Biaya listrik per bulan', 'version' => 1],
            ['pertanyaan' => 'Berapa jumlah kendaraan yang dimiliki orang tua/keluarga?', 'version' => 1],
        ];

        \DB::table('pertanyaans')->insert($createMultipleJawabans);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaans');
    }
};