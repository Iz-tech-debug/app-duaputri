<?php

namespace Database\Seeders;

use App\Models\Basket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukan data kedalam tabel keranjang
        $keranjang = [
            [
                'user_id' => 1,
                'barang_id' => 3,
                'hr_jual' => 12000,
                'qty' => 2,
                'subtotal' => 24000,
            ],
            [
                'user_id' => 1,
                'barang_id' => 1,
                'hr_jual' => 12000,
                'qty' => 2,
                'subtotal' => 24000,
            ],
        ];
        foreach ($keranjang as $value) {
            Basket::create([
                'user_id' => $value['user_id'],
                'barang_id' => $value['barang_id'],
                'hr_jual' => $value['hr_jual'],
                'qty' => $value['qty'],
                'subtotal' => $value['subtotal'],
            ]);
        }
    }
}
