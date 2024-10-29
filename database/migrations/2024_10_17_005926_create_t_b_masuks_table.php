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
        Schema::create('t_b_masuks', function (Blueprint $table) {
            $table->string('id_tmasuk')->primary();
            $table->unsignedBigInteger('supplier_id');
            $table->date('tgl_bmasuk');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_b_masuks');
    }
};
