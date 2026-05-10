<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin TechFix',
            'email' => 'admin@techfix.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}
