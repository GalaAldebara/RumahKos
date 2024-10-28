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
        Schema::table('users', function (Blueprint $table) {
            $table->char('provinsi', 2)->index()->nullable();
            $table->char('kota', 4)->index()->nullable();
            $table->char('kecamatan', 7)->index()->nullable();
            $table->char('kelurahan', 10)->index()->nullable();

            $table->foreign('provinsi')->references('id')->on('provinces');
            $table->foreign('kota')->references('id')->on('regencies');
            $table->foreign('kecamatan')->references('id')->on('districts');
            $table->foreign('kelurahan')->references('id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
