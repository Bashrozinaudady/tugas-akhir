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
        Schema::create('transaksi_order_detils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_order_id');
            $table->unsignedBigInteger('produk_id');
            $table->float('jumlah');
            $table->timestamps();

            $table->foreign('transaksi_order_id')->references('id')->on('transaksi_orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_order_detils');
    }
};
