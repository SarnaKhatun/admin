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
                'name' => "Clients",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => "Directors",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => "Scheme",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'name' => "Membership Account",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'name' => "Provident Fund",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'name' => "Monthly Collection",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'name' => "Report",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 9,
                'name' => "Withdraw",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 10,
                'name' => "Accounts",
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'id' => 11,
                'name' => "Expense",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 12,
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
