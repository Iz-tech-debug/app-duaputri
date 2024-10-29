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
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama_barang', 255);
            $table->integer('hr_jual');
            $table->unsignedBigInteger('satuan_id');
            $table->unsignedBigInteger('kategori_id');
            $table->integer('jumlah');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('satuan_id')->references('id')->on('units');
            $table->foreign('kategori_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
