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
        Schema::create('d_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('barang_id');
            $table->integer('qty');
            $table->integer('subtotal');
            $table->timestamps();

            // Foreign key transaksi
            $table->foreign('transaksi_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('barang_id')->references('id_barang')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_transactions');
    }
};
