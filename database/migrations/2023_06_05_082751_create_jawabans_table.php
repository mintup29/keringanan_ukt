<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pertanyaan')->constrained('pertanyaans');
            $table->text('jawaban');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        DB::table('jawabans')->insert(
            array(
                'id_pertanyaan' => '1',
                'jawaban' => '<3'
            ),array(
                'id_pertanyaan' => '1',
                'jawaban' => '3,0 - 5,0'
            ),array(
                'id_pertanyaan' => '1',
                'jawaban' => '5,1 - 7'
            ),array(
                'id_pertanyaan' => '1',
                'jawaban' => '>7'
            ),array(
                'id_pertanyaan' => '2',
                'jawaban' => 'Lengkap'
            ),array(
                'id_pertanyaan' => '2',
                'jawaban' => 'Piatu (Ibu Meninggal)'
            ),array(
                'id_pertanyaan' => '2',
                'jawaban' => 'Yatim (Bapak Meninggal)'
            ),array(
                'id_pertanyaan' => '2',
                'jawaban' => 'Yatim Piatu'
            ),array(
                'id_pertanyaan' => '3',
                'jawaban' => 'PNS Gol III & IV / Pegawai BUMN'
            ),array(
                'id_pertanyaan' => '3',
                'jawaban' => 'Karyawan Swasta / PNS Gol II dan I / Pensiunan PNS / BUMN'
            ),array(
                'id_pertanyaan' => '3',
                'jawaban' => 'Petani / Pedagang / Pensiunan Swasta'
            ),array(
                'id_pertanyaan' => '3',
                'jawaban' => 'Serabutan'
            ),array(
                'id_pertanyaan' => '4',
                'jawaban' => 'Ya'
            ),array(
                'id_pertanyaan' => '4',
                'jawaban' => 'Tidak'
            ),array(
                'id_pertanyaan' => '5',
                'jawaban' => 'Kedua Orang Tua'
            ),array(
                'id_pertanyaan' => '5',
                'jawaban' => 'Salah Satu'
            ),array(
                'id_pertanyaan' => '6',
                'jawaban' => '>8jt'
            ),array(
                'id_pertanyaan' => '6',
                'jawaban' => '>5jt'
            ),array(
                'id_pertanyaan' => '6',
                'jawaban' => '>2,5 - 5jt'
            ),array(
                'id_pertanyaan' => '6',
                'jawaban' => '<2,5jt'
            ),array(
                'id_pertanyaan' => '7',
                'jawaban' => '1'
            ),array(
                'id_pertanyaan' => '7',
                'jawaban' => '2'
            ),array(
                'id_pertanyaan' => '7',
                'jawaban' => '3'
            ),array(
                'id_pertanyaan' => '7',
                'jawaban' => '>3'
            ),array(
                'id_pertanyaan' => '8',
                'jawaban' => '>3'
            ),array(
                'id_pertanyaan' => '8',
                'jawaban' => '3'
            ),array(
                'id_pertanyaan' => '8',
                'jawaban' => '2'
            ),array(
                'id_pertanyaan' => '8',
                'jawaban' => '1'
            ),array(
                'id_pertanyaan' => '9',
                'jawaban' => '<3'
            ),array(
                'id_pertanyaan' => '9',
                'jawaban' => '3'
            ),array(
                'id_pertanyaan' => '9',
                'jawaban' => '4'
            ),array(
                'id_pertanyaan' => '9',
                'jawaban' => '>5'
            ),array(
                'id_pertanyaan' => '10',
                'jawaban' => 'Menikah'
            ),array(
                'id_pertanyaan' => '10',
                'jawaban' => 'SD / SMP / SMA'
            ),array(
                'id_pertanyaan' => '10',
                'jawaban' => 'Tidak / Belum Menikah'
            ),array(
                'id_pertanyaan' => '10',
                'jawaban' => 'Kuliah'
            ),array(
                'id_pertanyaan' => '11',
                'jawaban' => 'Milik Pribadi / Rumah Dinas'
            ),array(
                'id_pertanyaan' => '11',
                'jawaban' => 'Menumpang'
            ),array(
                'id_pertanyaan' => '11',
                'jawaban' => 'Sewa / Kontrak'
            ),array(
                'id_pertanyaan' => '12',
                'jawaban' => 'Tembok Permanen, Keramik Luas Lebih 80 meter'
            ),array(
                'id_pertanyaan' => '12',
                'jawaban' => 'Semi Permanen, Keramik'
            ),array(
                'id_pertanyaan' => '12',
                'jawaban' => 'Semi Permanen, Tidak Keramik'
            ),array(
                'id_pertanyaan' => '12',
                'jawaban' => 'Tidak Permanen'
            ),array(
                'id_pertanyaan' => '13',
                'jawaban' => '>500.000'
            ),array(
                'id_pertanyaan' => '13',
                'jawaban' => '>250.000 - 500.000'
            ),array(
                'id_pertanyaan' => '13',
                'jawaban' => '>150.000 - 250.000'
            ),array(
                'id_pertanyaan' => '13',
                'jawaban' => '<150.000'
            ),array(
                'id_pertanyaan' => '14',
                'jawaban' => 'Roda 4 (1 buah) dan atau 4 meter'
            ),array(
                'id_pertanyaan' => '14',
                'jawaban' => '3 meter'
            ),array(
                'id_pertanyaan' => '14',
                'jawaban' => '2 meter'
            ),array(
                'id_pertanyaan' => '14',
                'jawaban' => '1 meter'
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};