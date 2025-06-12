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
            'nama' => 'Admin Schedulo',
            'email' => 'admin@schedulo.com',
            'password' => Hash::make('admin123'), 
            'role' => 'admin',
        ]);

        Akun::create([
            'nama' => 'User Schedulo',
            'email' => 'user@schedulo.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
