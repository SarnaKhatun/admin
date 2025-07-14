<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Director;
use App\Models\MemberAccountStatement;
use App\Models\MembershipAccount;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MembershipAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $lastMember = DB::table('membership_accounts')->orderBy('id', 'desc')->first();
        $lastMemberId = $lastMember ?  $lastMember->account_number : 0;

        $clients = Customer::pluck('client_number');
        $directors = Director::pluck('id');

        for ($i = 0; $i < 2; $i++) {
            $lastMemberId++; // Increment the member ID for each iteration

            $membershipAccount = MembershipAccount::create([
                'account_number' => str_pad($lastMemberId, 6, '0', STR_PAD_LEFT),
                'client_id' => $faker->randomElement($clients),
                'director_id' => $faker->randomElement($directors),
                'package_id' => $faker->numberBetween(1, 4),
                'opening_balance' => $faker->numberBetween(1000, 5000),

                // Nominee details
                'nominee_name_bn' => $faker->name(),
                'relation_with_member' => $faker->randomElement(['Brother', 'Sister', 'Spouse', 'Friend']),
                'nominee_dob' => $faker->date(),
                'nominee_nid_number' => $faker->unique()->numerify('#############'),
                'nominee_address' => $faker->address(),
            ]);

            MemberAccountStatement::create([
                'membership_account_id' => $membershipAccount->id,
                'date' => now(),
                'particular' => 'Opening Balance',
                'deposit' => 0.00,
                'withdraw' => 0.00,
                'balance' => $membershipAccount->opening_balance,
                'created_by' => 1,
            ]);
        }

    }
}
