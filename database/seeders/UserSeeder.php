<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pembenihan
        $user = [
            [
                'nama' => 'Super Admin',
                'email' => 'SADMIN@gmail.com',
                'password' => Hash::make('1'),
                'id_role' => 1,
                'alamat' => 'dimana',
                'umur' => '18',
                'jenis_kelamin' => 'Laki-laki',
                'no_telp' => '081223025896',
            ],
        ];
        foreach ($user as $value) {
            User::create([
                'nama' => $value['nama'],
                'email' => $value['email'],
                'password' => $value['password'],
                'id_role' => $value['id_role'],
                'alamat' => $value['alamat'],
                'umur' => $value['umur'],
                'jenis_kelamin' => $value['jenis_kelamin'],
                'no_telp' => $value['no_telp'],
            ]);
        }
    }
}
