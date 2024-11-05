<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER after_insert_transaksi
            AFTER INSERT ON transactions
            FOR EACH ROW
            BEGIN
                -- Memindahkan data dari tabel keranjang ke transaksi_detail
                INSERT INTO d_transactions
                (transaksi_id, barang_id, qty, subtotal, created_at, updated_at)
                SELECT
                    NEW.kode_transaksi, kode_barang, qty, subtotal, now(), now()
                FROM baskets;

                -- Mengosongkan tabel keranjang
                DELETE FROM baskets;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DROP TRIGGER IF EXISTS after_insert_transaksi');
    }
};
