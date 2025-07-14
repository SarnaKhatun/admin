<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01945678997',
            'user_type' => 1,
            'password' => Hash::make(12345678),
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'phone' => '01945678894',
            'user_type' => 2,
            'password' => Hash::make(12345678),
        ]);
    }
}
