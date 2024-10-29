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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('id_role');

            // Foreign key constraints
            $table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade');

            $table->text('alamat');
            $table->integer('umur');
            $table->string('jenis_kelamin');
            $table->string('no_telp');
            $table->rememberToken();
            $table->timestamps();
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
