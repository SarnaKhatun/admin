<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            DirectorSeeder::class,
            PackageSeeder::class,
           // MembershipAccountSeeder::class,
            PaymentMethodSeeder::class,
            AccountSeeder::class,
            RoleSeeder::class,
            ModelHasRolesSeeder::class,
            PermissionSeeder::class,
            PermissionModuleSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            ThanaSeeder::class,
            UnionSeeder::class,
        ]);
    }
}
