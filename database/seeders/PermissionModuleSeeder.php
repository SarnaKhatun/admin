<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                'id' => 1,
                'name' => "Dashboard",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => "Access Control",
                'created_at' => now(),
                'updated_at' => now()
            ]

        ];

        foreach ($modules as $module) {
            DB::table('permission_modules')->insert($module);
        }
    }
}
