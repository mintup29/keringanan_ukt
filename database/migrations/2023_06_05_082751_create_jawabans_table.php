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
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertanyaan_id')->constrained('pertanyaans')->onDelete('cascade');
            $table->text('jawaban');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        $createMultipleJawabans = [
            ['pertanyaan_id' => 1, 'jawaban' => '<3'],
            ['pertanyaan_id' => 1, 'jawaban' => '3,0 - 5,0'],
            ['pertanyaan_id' => 1, 'jawaban' => '5,1 - 7'],
            ['pertanyaan_id' => 1, 'jawaban' => '>7'],
            ['pertanyaan_id' => 2, 'jawaban' => 'Lengkap'],
            ['pertanyaan_id' => 2, 'jawaban' => 'Piatu (Ibu Meninggal)'],
            ['pertanyaan_id' => 2, 'jawaban' => 'Yatim (Bapak Meninggal)'],
            ['pertanyaan_id' => 2, 'jawaban' => 'Yatim Piatu'],
            ['pertanyaan_id' => 3, 'jawaban' => 'PNS Gol III & IV / Pegawai BUMN'],
            ['pertanyaan_id' => 3, 'jawaban' => 'Karyawan Swasta / PNS Gol II dan I / Pensiunan PNS / BUMN'],
            ['pertanyaan_id' => 3, 'jawaban' => 'Petani / Pedagang / Pensiunan Swasta'],
            ['pertanyaan_id' => 3, 'jawaban' => 'Serabutan'],
            ['pertanyaan_id' => 4, 'jawaban' => 'Ya'],
            ['pertanyaan_id' => 4, 'jawaban' => 'Tidak'],
            ['pertanyaan_id' => 5, 'jawaban' => 'Kedua Orang Tua'],
            ['pertanyaan_id' => 5, 'jawaban' => 'Salah Satu'],
            ['pertanyaan_id' => 6, 'jawaban' => '>8jt'],
            ['pertanyaan_id' => 6, 'jawaban' => '>5jt'],
            ['pertanyaan_id' => 6, 'jawaban' => '>2,5 - 5jt'],
            ['pertanyaan_id' => 6, 'jawaban' => '<2,5jt'],
            ['pertanyaan_id' => 7, 'jawaban' => '1'],
            ['pertanyaan_id' => 7, 'jawaban' => '2'],
            ['pertanyaan_id' => 7, 'jawaban' => '3'],
            ['pertanyaan_id' => 7, 'jawaban' => '>3'],
            ['pertanyaan_id' => 8, 'jawaban' => '>3'],
            ['pertanyaan_id' => 8, 'jawaban' => '3'],
            ['pertanyaan_id' => 8, 'jawaban' => '2'],
            ['pertanyaan_id' => 8, 'jawaban' => '1'],
            ['pertanyaan_id' => 9, 'jawaban' => '<3'],
            ['pertanyaan_id' => 9, 'jawaban' => '3'],
            ['pertanyaan_id' => 9, 'jawaban' => '4'],
            ['pertanyaan_id' => 9, 'jawaban' => '>5'],
            ['pertanyaan_id' => 10, 'jawaban' => 'Menikah'],
            ['pertanyaan_id' => 10, 'jawaban' => 'SD / SMP / SMA'],
            ['pertanyaan_id' => 10, 'jawaban' => 'Tidak / Belum Menikah'],
            ['pertanyaan_id' => 10, 'jawaban' => 'Kuliah'],
            ['pertanyaan_id' => 11, 'jawaban' => 'Milik Pribadi / Rumah Dinas'],
            ['pertanyaan_id' => 11, 'jawaban' => 'Menumpang'],
            ['pertanyaan_id' => 11, 'jawaban' => 'Sewa / Kontrak'],
            ['pertanyaan_id' => 12, 'jawaban' => 'Tembok Permanen, Keramik Luas Lebih 80 meter'],
            ['pertanyaan_id' => 12, 'jawaban' => 'Semi Permanen, Keramik'],
            ['pertanyaan_id' => 12, 'jawaban' => 'Semi Permanen, Tidak Keramik'],
            ['pertanyaan_id' => 12, 'jawaban' => 'Tidak Permanen'],
            ['pertanyaan_id' => 13, 'jawaban' => '>500.000'],
            ['pertanyaan_id' => 13, 'jawaban' => '>250.000 - 500.000'],
            ['pertanyaan_id' => 13, 'jawaban' => '>150.000 - 250.000'],
            ['pertanyaan_id' => 13, 'jawaban' => '<150.000'],
            ['pertanyaan_id' => 14, 'jawaban' => 'Roda 4 (1 buah) dan atau 4 motor'],
            ['pertanyaan_id' => 14, 'jawaban' => '3 motor'],
            ['pertanyaan_id' => 14, 'jawaban' => '2 motor'],
            ['pertanyaan_id' => 14, 'jawaban' => '1 motor']
        ];

        //User::insert($createMultipleUsers); // Eloquent
        \DB::table('jawabans')->insert($createMultipleJawabans); // Query Builder

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};