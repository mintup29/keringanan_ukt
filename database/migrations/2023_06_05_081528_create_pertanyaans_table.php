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
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        DB::table('pertanyaans')->insert(['pertanyaan' => 'Berapa nominal UKT Anda?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Apakah orang tua (bapak dan ibu) Anda masih lengkap atau tidak?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Apakah pekerjaan orang tua Anda? Jika PNS, apa pangkat dan golongannya?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Apakah kedua orang tua bekerja?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Jika hanya salah satu, siapa yang bekerja?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Berapa total pendapatan orang tua (ayah + ibu) saat ini?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Berapa jumlah anak dalam keluarga Anda?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Anak keberapakah Anda?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Berapa jumlah anggota keluarga yang menjadi tanggungan orang tua saat ini?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Jelaskan status Saudara anda (menikah ataukah belum) dan jenjang pendidikan saudara anda yang menjadi tanggungan orang tua?']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Status kepemilikan rumah']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Deskripsikan kondisi rumah Saudara (misal tembok permanen/semi permanen, lantai keramik/tidak, Luas tanah/bangunan)']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Biaya listrik per bulan']);
        DB::table('pertanyaans')->insert(['pertanyaan' => 'Berapa jumlah kendaraan yang dimiliki orang tua/keluarga?']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaans');
    }
};