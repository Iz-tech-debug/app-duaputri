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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nama_suplier'); // Nama Suplier
            $table->string('alamat'); // Alamat Suplier
            $table->string('no_telp'); // Nomor Telepon
            $table->string('nama_perusahaan')->nullable(); // Nama Perusahaan (opsional)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
