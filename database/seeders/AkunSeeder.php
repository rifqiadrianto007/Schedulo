<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class AkunSeeder extends Seeder
{
    public function run(): void
    {
        Akun::create([
            'nama' => 'Admin123',
            'nomor_induk' => '714074737',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        Akun::create([
            'nama' => 'User123',
            'nomor_induk' => '232410103001',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
