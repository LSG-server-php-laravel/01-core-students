<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->delete();

        User::create([
            'name' => 'Oriol Admin',
            'email' => 'admin@petrescue.test',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Ana User',
            'email' => 'ana@petrescue.test',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Pau User',
            'email' => 'pau@petrescue.test',
            'password' => Hash::make('password123'),
        ]);
    }
}
