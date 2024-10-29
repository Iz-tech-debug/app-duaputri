<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Pembenihan
        $categories = [
            [
                'nama_kategori' => 'Bahan Pangan',
            ],
            [
                'nama_kategori' => 'Olahan',
            ],
            [
                'nama_kategori' => 'Hasil Bumi',
            ],
        ];
        foreach ($categories as $value) {
            Category::create([
                'nama_kategori' => $value['nama_kategori'],
            ]);
        }
    }
}
