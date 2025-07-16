<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'permission_module_id' => 1,
                'name' => 'dashboard.view',
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 2,
                'name' => "role.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "role.list",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 2,
                'name' => "role.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "role.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "role.add/edit-role-permission",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "permission.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "permission.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "permission.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "permission.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "module.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "module.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "module.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "module.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "user.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "user.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "user.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "user.delete",
                'guard_name' => 'web',
            ],

        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert($permission);
        }
    }
}
