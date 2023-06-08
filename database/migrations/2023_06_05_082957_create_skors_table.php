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
        Schema::create('skors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pertanyaan')->constrained('pertanyaans');
            $table->foreignId('id_jawaban')->constrained('jawabans');
            $table->integer('skor');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        $createMultipleJawabans = [
            ['id_pertanyaan'=>1,'id_jawaban'=>1, 'skor' =>1],
            ['id_pertanyaan'=>1,'id_jawaban'=>2, 'skor' =>2],
            ['id_pertanyaan'=>1,'id_jawaban'=>3, 'skor' =>3],
            ['id_pertanyaan'=>1,'id_jawaban'=>4, 'skor' =>4],
            ['id_pertanyaan'=>2,'id_jawaban'=>5, 'skor' =>1],
            ['id_pertanyaan'=>2,'id_jawaban'=>6, 'skor' =>2],
            ['id_pertanyaan'=>2,'id_jawaban'=>7, 'skor' =>3],
            ['id_pertanyaan'=>2,'id_jawaban'=>8, 'skor' =>4],
            ['id_pertanyaan'=>3,'id_jawaban'=>9, 'skor' =>1],
            ['id_pertanyaan'=>3,'id_jawaban'=>10, 'skor' =>2],
            ['id_pertanyaan'=>3,'id_jawaban'=>11, 'skor' =>3],
            ['id_pertanyaan'=>3,'id_jawaban'=>12, 'skor' =>4],
            ['id_pertanyaan'=>4,'id_jawaban'=>13, 'skor' =>1],
            ['id_pertanyaan'=>4,'id_jawaban'=>14, 'skor' =>3],
            ['id_pertanyaan'=>5,'id_jawaban'=>15, 'skor' =>1],
            ['id_pertanyaan'=>5,'id_jawaban'=>16, 'skor' =>3],
            ['id_pertanyaan'=>6,'id_jawaban'=>17, 'skor' =>1],
            ['id_pertanyaan'=>6,'id_jawaban'=>18, 'skor' =>2],
            ['id_pertanyaan'=>6,'id_jawaban'=>19, 'skor' =>3],
            ['id_pertanyaan'=>6,'id_jawaban'=>20, 'skor' =>4],
            ['id_pertanyaan'=>7,'id_jawaban'=>21, 'skor' =>1],
            ['id_pertanyaan'=>7,'id_jawaban'=>22, 'skor' =>2],
            ['id_pertanyaan'=>7,'id_jawaban'=>23, 'skor' =>3],
            ['id_pertanyaan'=>7,'id_jawaban'=>24, 'skor' =>4],
            ['id_pertanyaan'=>8,'id_jawaban'=>25, 'skor' =>1],
            ['id_pertanyaan'=>8,'id_jawaban'=>26, 'skor' =>2],
            ['id_pertanyaan'=>8,'id_jawaban'=>27, 'skor' =>3],
            ['id_pertanyaan'=>8,'id_jawaban'=>28, 'skor' =>4],
            ['id_pertanyaan'=>9,'id_jawaban'=>29, 'skor' =>1],
            ['id_pertanyaan'=>9,'id_jawaban'=>30, 'skor' =>2],
            ['id_pertanyaan'=>9,'id_jawaban'=>31, 'skor' =>3],
            ['id_pertanyaan'=>9,'id_jawaban'=>32, 'skor' =>4],
            ['id_pertanyaan'=>10,'id_jawaban'=>33, 'skor' =>1],
            ['id_pertanyaan'=>10,'id_jawaban'=>34, 'skor' =>2],
            ['id_pertanyaan'=>10,'id_jawaban'=>35, 'skor' =>3],
            ['id_pertanyaan'=>10,'id_jawaban'=>36, 'skor' =>4],
            ['id_pertanyaan'=>11,'id_jawaban'=>37, 'skor' =>1],
            ['id_pertanyaan'=>11,'id_jawaban'=>38, 'skor' =>3],
            ['id_pertanyaan'=>11,'id_jawaban'=>39, 'skor' =>4],
            ['id_pertanyaan'=>12,'id_jawaban'=>40, 'skor' =>1],
            ['id_pertanyaan'=>12,'id_jawaban'=>41, 'skor' =>2],
            ['id_pertanyaan'=>12,'id_jawaban'=>42, 'skor' =>3],
            ['id_pertanyaan'=>12,'id_jawaban'=>43, 'skor' =>4],
            ['id_pertanyaan'=>13,'id_jawaban'=>44, 'skor' =>1],
            ['id_pertanyaan'=>13,'id_jawaban'=>45, 'skor' =>2],
            ['id_pertanyaan'=>13,'id_jawaban'=>46, 'skor' =>3],
            ['id_pertanyaan'=>13,'id_jawaban'=>47, 'skor' =>4],
            ['id_pertanyaan'=>14,'id_jawaban'=>48, 'skor' =>1],
            ['id_pertanyaan'=>14,'id_jawaban'=>49, 'skor' =>2],
            ['id_pertanyaan'=>14,'id_jawaban'=>50, 'skor' =>3],
            ['id_pertanyaan'=>14,'id_jawaban'=>51, 'skor' =>4]
        ];
    
        //User::insert($createMultipleUsers); // Eloquent
        \DB::table('skors')->insert($createMultipleJawabans); // Query Builder
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skors');
    }
};
