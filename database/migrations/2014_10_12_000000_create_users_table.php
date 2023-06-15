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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_type');
        });

        $createMultipleJawabans = [
            ['name' => 'Admin', 'email' => 'admin@x.com', 'password' => "$2y$10/PN7zjyCcuAT.mEB3uNCBUiqTv9m.KVuys7pAaON7XdO", 'user_type' => 'Admin'],
            ['name' => 'User', 'email' => 'user@x.com', 'password' => "$2y$10.4fNfdYq2Gecl1LSsi7xESAy7UEibz1ndarZGkKDL2", 'user_type' => 'User']
        ];

        //User::insert($createMultipleUsers); // Eloquent
        \DB::table('users')->insert($createMultipleJawabans); // Query Builder
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
