<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::create([
            'name' => 'Normal',
            'value' => '1200.00',
            'created_date'=> Carbon::now()->format('Y-m-d'),
        ]);
        Package::create([
            'name' => 'Silver',
            'value' => '1500.00',
            'created_date'=> Carbon::now()->format('Y-m-d'),
        ]);
        Package::create([
            'name' => 'Gold',
            'value' => '2000.00',
            'created_date'=> Carbon::now()->format('Y-m-d'),
        ]);
        Package::create([
            'name' => 'Premium',
            'value' => '3000.00',
            'created_date'=> Carbon::now()->format('Y-m-d'),
        ]);
    }
}
