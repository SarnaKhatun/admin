<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Director;
use App\Models\MembershipAccount;
use App\Models\MonthlySubscriptionFeeLedger;
use App\Models\Package;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('dashboard.view')) {
            return view('backend.index');
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }


    }
}
