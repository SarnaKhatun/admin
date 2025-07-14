<?php

namespace Database\Seeders;

use App\Models\Director;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Director::create([
            'client_id' => 000001,
            'name' => 'DirectorTest',
            'email' => 'drectorTest@gmail.com',
            'designation' => 'Director',
            'password' => Hash::make(12345678),
        ]);



    }
}
