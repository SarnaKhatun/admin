<?php


namespace App\Services;

use App\Models\Customer;
use App\Models\Director;
use App\Models\MembershipAccount;
use App\Models\MonthlySubscriptionFee;
use App\Models\Package;
use App\Models\ProvidentFund;
use App\Models\User;
use App\Models\Withdraw;

class SearchService
{
    public function search($searchType, $query)
    {
        $results = [];

        switch ($searchType) {
            case '1':
                $results['clients'] = Customer::where('name', 'like', "%{$query}%")->orWhere('client_number', 'like', "%{$query}%")->orWhere('nid_number', 'like', "%{$query}%")->get();
                break;
            case '2':
                $results['directors'] = Director::where('name', 'like', "%{$query}%")->orWhereHas('client', function ($q) use ($query) {
                    $q->where('nid_number', 'like', "%{$query}%");
                })->get();
                break;
            case '3':
                $results['schemes'] = Package::where('name', 'like', "%{$query}%")->get();
                break;
            case '4':
                $results['members'] = MembershipAccount::where('name', 'like', "%{$query}%")->orWhere('account_number', 'like', "%{$query}%")->get();
                break;
            case '5':
                $results['provident_funds'] = ProvidentFund::whereHas('client', function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%");
                    })->orWhereHas('director', function ($q) use ($query) {
                        $q->where('name', 'like', "%{$query}%");
                    })
                    ->get();
                break;
            case '6':
                $results['monthly_collections'] = MonthlySubscriptionFee::whereHas('membershipAccount', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%");
                })->get();
                break;
            case '7':
                $results['withdraws'] = Withdraw::where('member_name', 'like', "%{$query}%")->orWhere('member_number', 'like', "%{$query}%")->get();
                break;
            case '8':
                $results['users'] = User::where('name', 'like', "%{$query}%")->orWhere('email', 'like', "%{$query}%")->orWhereHas('roles', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%");
                })->get();
                break;
        }

        return $results;
    }
}
