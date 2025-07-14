<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'client_number' => '000001',
            'name' => 'Customer Test',
            'mobile_number' => '01675717825',
            'email' => 'ctest@gmail.com',
            'password' => Hash::make(12345678),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $faker = Faker::create();

        $lastUser = DB::table('customers')->orderBy('id', 'desc')->first();
        $lastClientId = $lastUser ? $lastUser->client_number : 0;

        for ($i = 0; $i < 5; $i++) {
            $lastClientId++;

            DB::table('customers')->insert([
                'client_number' => str_pad($lastClientId, 6, '0', STR_PAD_LEFT),
                'name' => $faker->name(),
                'mobile_number' => $faker->regexify('01[0-9]{9}'),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make(12345678),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
