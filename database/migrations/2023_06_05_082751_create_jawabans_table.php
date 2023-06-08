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

        $createMultipleJawabans = [
            ['id_pertanyaan'=>1,'jawaban'=>'<3'],
            ['id_pertanyaan'=>1,'jawaban'=>'3,0 - 5,0'],
            ['id_pertanyaan'=>1,'jawaban'=>'5,1 - 7'],
            ['id_pertanyaan'=>1,'jawaban'=>'>7'],
            ['id_pertanyaan'=>2,'jawaban'=>'Lengkap'],
            ['id_pertanyaan'=>2,'jawaban'=>'Piatu (Ibu Meninggal)'],
            ['id_pertanyaan'=>2,'jawaban'=>'Yatim (Bapak Meninggal)'],
            ['id_pertanyaan'=>2,'jawaban'=>'Yatim Piatu'],
            ['id_pertanyaan'=>3,'jawaban'=>'PNS Gol III & IV / Pegawai BUMN'],
            ['id_pertanyaan'=>3,'jawaban'=>'Karyawan Swasta / PNS Gol II dan I / Pensiunan PNS / BUMN'],
            ['id_pertanyaan'=>3,'jawaban'=>'Petani / Pedagang / Pensiunan Swasta'],
            ['id_pertanyaan'=>3,'jawaban'=>'Serabutan'],
            ['id_pertanyaan'=>4,'jawaban'=>'Ya'],
            ['id_pertanyaan'=>4,'jawaban'=>'Tidak'],
            ['id_pertanyaan'=>5,'jawaban'=>'Kedua Orang Tua'],
            ['id_pertanyaan'=>5,'jawaban'=>'Salah Satu'],
            ['id_pertanyaan'=>6,'jawaban'=>'>8jt'],
            ['id_pertanyaan'=>6,'jawaban'=>'>5jt'],
            ['id_pertanyaan'=>6,'jawaban'=>'>2,5 - 5jt'],
            ['id_pertanyaan'=>6,'jawaban'=>'<2,5jt'],
            ['id_pertanyaan'=>7,'jawaban'=>'1'],
            ['id_pertanyaan'=>7,'jawaban'=>'2'],
            ['id_pertanyaan'=>7,'jawaban'=>'3'],
            ['id_pertanyaan'=>7,'jawaban'=>'>3'],
            ['id_pertanyaan'=>8,'jawaban'=>'>3'],
            ['id_pertanyaan'=>8,'jawaban'=>'3'],
            ['id_pertanyaan'=>8,'jawaban'=>'2'],
            ['id_pertanyaan'=>8,'jawaban'=>'1'],
            ['id_pertanyaan'=>9,'jawaban'=>'<3'],
            ['id_pertanyaan'=>9,'jawaban'=>'3'],
            ['id_pertanyaan'=>9,'jawaban'=>'4'],
            ['id_pertanyaan'=>9,'jawaban'=>'>5'],
            ['id_pertanyaan'=>10,'jawaban'=>'Menikah'],
            ['id_pertanyaan'=>10,'jawaban'=>'SD / SMP / SMA'],
            ['id_pertanyaan'=>10,'jawaban'=>'Tidak / Belum Menikah'],
            ['id_pertanyaan'=>10,'jawaban'=>'Kuliah'],
            ['id_pertanyaan'=>11,'jawaban'=>'Milik Pribadi / Rumah Dinas'],
            ['id_pertanyaan'=>11,'jawaban'=>'Menumpang'],
            ['id_pertanyaan'=>11,'jawaban'=>'Sewa / Kontrak'],
            ['id_pertanyaan'=>12,'jawaban'=>'Tembok Permanen, Keramik Luas Lebih 80 meter'],
            ['id_pertanyaan'=>12,'jawaban'=>'Semi Permanen, Keramik'],
            ['id_pertanyaan'=>12,'jawaban'=>'Semi Permanen, Tidak Keramik'],
            ['id_pertanyaan'=>12,'jawaban'=>'Tidak Permanen'],
            ['id_pertanyaan'=>13,'jawaban'=>'>500.000'],
            ['id_pertanyaan'=>13,'jawaban'=>'>250.000 - 500.000'],
            ['id_pertanyaan'=>13,'jawaban'=>'>150.000 - 250.000'],
            ['id_pertanyaan'=>13,'jawaban'=>'<150.000'],
            ['id_pertanyaan'=>14,'jawaban'=>'Roda 4 (1 buah) dan atau 4 meter'],
            ['id_pertanyaan'=>14,'jawaban'=>'3 meter'],
            ['id_pertanyaan'=>14,'jawaban'=>'2 meter'],
            ['id_pertanyaan'=>14,'jawaban'=>'1 meter']
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