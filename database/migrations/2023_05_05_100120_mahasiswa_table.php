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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama');
            $table->string('prodi');
            $table->integer('semester');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $createMultipleJawabans = [
            ['nim' => 'p', 'nama' => 'q', 'prodi' => "e", 'semester' => 1, 'email' => 'p', 'email_verified_at' => NULL, 'password' => 'P', 'remember_token' => NULL, 'created_at' => NULL, 'updated_at' => NULL],
            ['nim' => '2', 'nama' => 'qwerrty', 'prodi' => "qw", 'semester' => 1, 'email' => 'qwee', 'email_verified_at' => NULL, 'password' => 'qwqer', 'remember_token' => NULL, 'created_at' => NULL, 'updated_at' => NULL]
        ];

        //User::insert($createMultipleUsers); // Eloquent
        \DB::table('mahasiswa')->insert($createMultipleJawabans); // Query Builder
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
