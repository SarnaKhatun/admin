<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $bankNames = ['BRAC Bank', 'City Bank', 'UCB Bank', 'DBBL Bank'];
        $branches = ['Uttara', 'Dhanmondi', 'Banani', 'Motijheel'];

        $mobileBankings = ['Bkash', 'Nagad', 'Rocket'];

        $paymentMethods = PaymentMethod::all();

        for ($i = 0; $i < 5; $i++) {
            $paymentMethod = $paymentMethods->random();
            $accountData = [
                'payment_method_id' => $paymentMethod->id,
                'account_name' => $faker->name,
                'balance' => number_format($faker->randomElement([1000, 2000, 3000, 4000, 5000]), 2, '.', ''),
            ];

            if ($paymentMethod->payment_method_name == 'Bank') {
                $accountData['account_number'] = $faker->bankAccountNumber;
                $accountData['bank_name'] = $bankNames[array_rand($bankNames)];
                $accountData['branch'] = $branches[array_rand($branches)];
            } elseif ($paymentMethod->payment_method_name == 'Mobile Banking') {
                $accountData['bank_name'] = $mobileBankings[array_rand($mobileBankings)];
                $accountData['account_number'] = $faker->numerify('017########');
                $accountData['branch'] = null;
            } elseif ($paymentMethod->payment_method_name == 'Cash') {
                $accountData['bank_name'] = 'Cash';
                $accountData['account_number'] = null;
                $accountData['branch'] = null;
            }

            Account::create($accountData);
        }
    }
}
