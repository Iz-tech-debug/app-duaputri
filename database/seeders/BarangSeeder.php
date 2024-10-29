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
                'hr_awal' => 11000,
                'hr_jual' => 12000,
                'tgl_exp' => '2025-12-31',
                'satuan' => 'Karung',
                'kategori' => 'Barang Pangan',
                'no_order' => 'KD098667890',
                'jumlah' => '12',
            ],
        ];
        foreach ($barang as $value) {
            Barang::create([
                'id_barang' => $value['id_barang'],
                'nama_barang' => $value['nama_barang'],
                'hr_awal' => $value['hr_awal'],
                'hr_jual' => $value['hr_jual'],
                'tgl_exp' => $value['tgl_exp'],
                'satuan' => $value['satuan'],
                'kategori' => $value['kategori'],
                'no_order' => $value['no_order'],
                'jumlah' => $value['jumlah'],
            ]);
        }
    }
}
