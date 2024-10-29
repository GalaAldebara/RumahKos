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
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->unsignedBigInteger('user')->index()->nullable();
            $table->unsignedBigInteger('kamar')->index();
            $table->integer('harga');
            $table->integer('total_tinggal');
            $table->dateTime('tanggal_pemesanan')->nullable();
            $table->string('dibooking_sampai');
            $table->enum('status', ['Unpaid', 'Paid']);
            $table->enum('jenis', ['Sewa', 'Perpanjang']);


            $table->timestamps();
            $table->foreign('user')->references('user_id')->on('users');
            $table->foreign('kamar')->references('kamar_id')->on('kamar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
