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
                'permission_module_id' => 1,
                'name' => 'dashboard.total-customer',
                'guard_name' => 'web'
            ],
            [
                'permission_module_id' => 1,
                'name' => 'dashboard.total-director',
                'guard_name' => 'web'
            ],
            [
                'permission_module_id' => 1,
                'name' => 'dashboard.total-package',
                'guard_name' => 'web'
            ],
            [
                'permission_module_id' => 1,
                'name' => 'dashboard.total-membership-account',
                'guard_name' => 'web'
            ],

            [
                'permission_module_id' => 2,
                'name' => "client.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "client.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "client.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "client.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 2,
                'name' => "client.pdf",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 3,
                'name' => "director.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 3,
                'name' => "director.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 3,
                'name' => "director.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 3,
                'name' => "director.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 3,
                'name' => "director.pdf",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 4,
                'name' => "scheme.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 4,
                'name' => "scheme.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 4,
                'name' => "scheme.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 4,
                'name' => "scheme.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 4,
                'name' => "scheme.pdf",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 5,
                'name' => "membership-account.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 5,
                'name' => "membership-account.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 5,
                'name' => "membership-account.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 5,
                'name' => "membership-account.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 5,
                'name' => "membership-account.pdf",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 5,
                'name' => "membership-account.view",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 5,
                'name' => "membership-account.view-pdf",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 5,
                'name' => "membership-account.statement",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 5,
                'name' => "membership-account.statement-pdf",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 6,
                'name' => "provident-fund.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 6,
                'name' => "provident-fund.create",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 6,
                'name' => "provident-fund.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 6,
                'name' => "provident-fund.pdf",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 6,
                'name' => "provident-fund.ledger-view",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 6,
                'name' => "provident-fund.ledger-pdf",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 7,
                'name' => "monthly-collection.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 7,
                'name' => "monthly-collection.create",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 7,
                'name' => "monthly-collection.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 7,
                'name' => "monthly-collection.pdf",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 7,
                'name' => "monthly-collection.ledger-view",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 7,
                'name' => "monthly-collection.ledger-pdf",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 8,
                'name' => "director-analysis.report",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 8,
                'name' => "cash-flow-statement.report",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 9,
                'name' => "withdraw.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 9,
                'name' => "withdraw.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 9,
                'name' => "withdraw.pdf",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 10,
                'name' => "account.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 10,
                'name' => "account.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 10,
                'name' => "account.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 10,
                'name' => "account.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 10,
                'name' => "payment-method.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 10,
                'name' => "payment-method.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 10,
                'name' => "payment-method.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 10,
                'name' => "payment-method.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense-head.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense-head.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense-head.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense-head.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense-subhead.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense-subhead.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense-subhead.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense-subhead.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 11,
                'name' => "expense.pdf",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 12,
                'name' => "role.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "role.list",
                'guard_name' => 'web',
            ],

            [
                'permission_module_id' => 12,
                'name' => "role.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "role.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "role.add/edit-role-permission",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "permission.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "permission.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "permission.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "permission.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "module.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "module.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "module.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "module.delete",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "user.create",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "user.list",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "user.edit",
                'guard_name' => 'web',
            ],
            [
                'permission_module_id' => 12,
                'name' => "user.delete",
                'guard_name' => 'web',
            ],

        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert($permission);
        }
    }
}
