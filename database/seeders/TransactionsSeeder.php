<?php

namespace Database\Seeders;

use App\Models\Transactions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pembenihan
        // $transaksi = [
        //     [
        //         'nama_suplier' => 'PT Sumber Rejeki',
        //         'alamat' => 'Jl. Mangga No. 123, Jakarta',
        //         'no_telp' => '0211234567',
        //         'nama_perusahaan' => 'PT Sumber Rejeki'
        //     ],
        // ];
        // foreach ($transaksi as $value) {
        //     Transactions::create([
        //         'nama_suplier' => $value['nama_suplier'],
        //         'alamat' => $value['alamat'],
        //         'no_telp' => $value['no_telp'],
        //         'nama_perusahaan' => $value['nama_perusahaan'],
        //     ]);
        // }
    }
}
