<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Akun::updateOrCreate(
            ['nomor_induk' => '12344321'],
            [
                'nama' => 'Admin TU',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
        );
    }
}
