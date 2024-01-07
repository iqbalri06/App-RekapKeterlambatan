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
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('adminsekolah')
        ]);

        User::create([
            'name' => 'PS Cicurug 1',
            'email' => 'cic1@gmail.com',
            'role' => 'ps',
            'password' => Hash::make('pembimbing')
        ]);

    }
}
