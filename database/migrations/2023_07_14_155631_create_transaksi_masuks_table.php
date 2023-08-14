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
        Schema::create('transaksi_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('keterangan');
            $table->unsignedBigInteger('mitra_id');
            $table->timestamp('tanggal_transaksi');
            $table->decimal('nominal', 12, 4);
            $table->timestamps();

            $table->foreign('mitra_id')->references('id')->on('mitras')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_masuks');
    }
};
