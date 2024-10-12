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
        Schema::create('kamar', function (Blueprint $table) {
            $table->bigIncrements('kamar_id');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('luas');
            $table->string('fasilitas');
            $table->integer('harga');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
