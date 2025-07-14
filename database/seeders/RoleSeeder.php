<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'name' => "super_admin",
                'guard_name' => 'web',
            ],


        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }
    }
}
