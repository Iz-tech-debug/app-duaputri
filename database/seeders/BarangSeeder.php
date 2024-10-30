<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Memasukan data kedalam tabel barang
        $barang = [
            [
                'id_barang' => 1243221312,
                'nama_barang' => 'Kerupuk Merah',
                'hr_jual' => 12000,
                'satuan_id' => 1,
                'kategori_id' => 2,
                'jumlah' => 1,
            ],
        ];
        foreach ($barang as $value) {
            Barang::create([
                'id_barang' => $value['id_barang'],
                'nama_barang' => $value['nama_barang'],
                'hr_jual' => $value['hr_jual'],
                'satuan_id' => $value['satuan_id'],
                'kategori_id' => $value['kategori_id'],
                'jumlah' => $value['jumlah'],
            ]);
        }
    }
}
