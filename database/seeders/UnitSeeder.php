<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pembenihan
        $units = [
            [
                'nama_satuan' => 'Kg',
            ],
            [
                'nama_satuan' => 'Pcs',
            ],
            [
                'nama_satuan' => 'L',
            ],
            [
                'nama_satuan' => 'Kardus',
            ],
        ];
        foreach ($units as $value) {
            Unit::create([
                'nama_satuan' => $value['nama_satuan'],
            ]);
        }
    }
}
