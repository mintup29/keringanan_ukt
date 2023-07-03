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
        Schema::create('accept_dates', function (Blueprint $table) {
            $table->bigIncrements('id');    
            $table->date('accept_since');
            $table->date('accept_until');
            $table->string('semester')->comment('ganjil/genap');
            $table->smallInteger('year');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
