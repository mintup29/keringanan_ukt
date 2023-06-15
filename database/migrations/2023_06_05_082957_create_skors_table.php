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
        Schema::create('skors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertanyaan_id')->constrained('pertanyaans')->onDelete('cascade');
            $table->foreignId('jawaban_id')->constrained('jawabans')->onDelete('cascade');
            $table->integer('skor');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        $createMultipleJawabans = [
            ['pertanyaan_id' => 1, 'jawaban_id' => 1, 'skor' => 1],
            ['pertanyaan_id' => 1, 'jawaban_id' => 2, 'skor' => 2],
            ['pertanyaan_id' => 1, 'jawaban_id' => 3, 'skor' => 3],
            ['pertanyaan_id' => 1, 'jawaban_id' => 4, 'skor' => 4],
            ['pertanyaan_id' => 2, 'jawaban_id' => 5, 'skor' => 1],
            ['pertanyaan_id' => 2, 'jawaban_id' => 6, 'skor' => 2],
            ['pertanyaan_id' => 2, 'jawaban_id' => 7, 'skor' => 3],
            ['pertanyaan_id' => 2, 'jawaban_id' => 8, 'skor' => 4],
            ['pertanyaan_id' => 3, 'jawaban_id' => 9, 'skor' => 1],
            ['pertanyaan_id' => 3, 'jawaban_id' => 10, 'skor' => 2],
            ['pertanyaan_id' => 3, 'jawaban_id' => 11, 'skor' => 3],
            ['pertanyaan_id' => 3, 'jawaban_id' => 12, 'skor' => 4],
            ['pertanyaan_id' => 4, 'jawaban_id' => 13, 'skor' => 1],
            ['pertanyaan_id' => 4, 'jawaban_id' => 14, 'skor' => 3],
            ['pertanyaan_id' => 5, 'jawaban_id' => 15, 'skor' => 1],
            ['pertanyaan_id' => 5, 'jawaban_id' => 16, 'skor' => 3],
            ['pertanyaan_id' => 6, 'jawaban_id' => 17, 'skor' => 1],
            ['pertanyaan_id' => 6, 'jawaban_id' => 18, 'skor' => 2],
            ['pertanyaan_id' => 6, 'jawaban_id' => 19, 'skor' => 3],
            ['pertanyaan_id' => 6, 'jawaban_id' => 20, 'skor' => 4],
            ['pertanyaan_id' => 7, 'jawaban_id' => 21, 'skor' => 1],
            ['pertanyaan_id' => 7, 'jawaban_id' => 22, 'skor' => 2],
            ['pertanyaan_id' => 7, 'jawaban_id' => 23, 'skor' => 3],
            ['pertanyaan_id' => 7, 'jawaban_id' => 24, 'skor' => 4],
            ['pertanyaan_id' => 8, 'jawaban_id' => 25, 'skor' => 1],
            ['pertanyaan_id' => 8, 'jawaban_id' => 26, 'skor' => 2],
            ['pertanyaan_id' => 8, 'jawaban_id' => 27, 'skor' => 3],
            ['pertanyaan_id' => 8, 'jawaban_id' => 28, 'skor' => 4],
            ['pertanyaan_id' => 9, 'jawaban_id' => 29, 'skor' => 1],
            ['pertanyaan_id' => 9, 'jawaban_id' => 30, 'skor' => 2],
            ['pertanyaan_id' => 9, 'jawaban_id' => 31, 'skor' => 3],
            ['pertanyaan_id' => 9, 'jawaban_id' => 32, 'skor' => 4],
            ['pertanyaan_id' => 10, 'jawaban_id' => 33, 'skor' => 1],
            ['pertanyaan_id' => 10, 'jawaban_id' => 34, 'skor' => 2],
            ['pertanyaan_id' => 10, 'jawaban_id' => 35, 'skor' => 3],
            ['pertanyaan_id' => 10, 'jawaban_id' => 36, 'skor' => 4],
            ['pertanyaan_id' => 11, 'jawaban_id' => 37, 'skor' => 1],
            ['pertanyaan_id' => 11, 'jawaban_id' => 38, 'skor' => 3],
            ['pertanyaan_id' => 11, 'jawaban_id' => 39, 'skor' => 4],
            ['pertanyaan_id' => 12, 'jawaban_id' => 40, 'skor' => 1],
            ['pertanyaan_id' => 12, 'jawaban_id' => 41, 'skor' => 2],
            ['pertanyaan_id' => 12, 'jawaban_id' => 42, 'skor' => 3],
            ['pertanyaan_id' => 12, 'jawaban_id' => 43, 'skor' => 4],
            ['pertanyaan_id' => 13, 'jawaban_id' => 44, 'skor' => 1],
            ['pertanyaan_id' => 13, 'jawaban_id' => 45, 'skor' => 2],
            ['pertanyaan_id' => 13, 'jawaban_id' => 46, 'skor' => 3],
            ['pertanyaan_id' => 13, 'jawaban_id' => 47, 'skor' => 4],
            ['pertanyaan_id' => 14, 'jawaban_id' => 48, 'skor' => 1],
            ['pertanyaan_id' => 14, 'jawaban_id' => 49, 'skor' => 2],
            ['pertanyaan_id' => 14, 'jawaban_id' => 50, 'skor' => 3],
            ['pertanyaan_id' => 14, 'jawaban_id' => 51, 'skor' => 4]
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