<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pembenihan
        $roles = [
            [
                'nama_role' => 'Admin',
            ],
        ];
        foreach ($roles as $value) {
            Role::create([
                'nama_role' => $value['nama_role'],
            ]);
        }
    }
}
