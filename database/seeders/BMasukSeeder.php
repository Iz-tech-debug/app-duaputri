<?php

namespace Database\Seeders;

use App\Models\BMasuk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pembenihan
        $barang_masuk = [
            [
                'id_trans' => 'KD123',
                'supplier_id' => 1,
                'barang_id' => 2,
                'jumlah' => 2,
                'tanggal_masuk' => now(),
            ],
        ];
        foreach ($barang_masuk as $value) {
            BMasuk::create([
                'id_trans' => $value['id_trans'],
                'supplier_id' => $value['supplier_id'],
                'barang_id' => $value['barang_id'],
                'jumlah' => $value['jumlah'],
                'tanggal_masuk' => $value['tanggal_masuk'],
            ]);
        }
    }
}
