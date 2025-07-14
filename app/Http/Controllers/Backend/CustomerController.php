<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\MemberAccountStatement;
use App\Models\MembershipAccount;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

use lemonpatwari\bangladeshgeocode\Models\District;
use lemonpatwari\bangladeshgeocode\Models\Thana;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;



class CustomerController extends Controller
{
    use ImageUploader;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Customer::query();


        if ($request->filled('search_items')) {
            $searchItems = $request->input('search_items');
            $query->where(function ($q) use ($searchItems) {
                $q->where('client_number', 'like', "%{$searchItems}%")->orWhere('name', 'like', "%{$searchItems}%")
                    ->orWhere('phone', 'like', "%{$searchItems}%")->orWhere('nid_number', 'like', "%{$searchItems}%");
            });
        }

        if ($user->hasRole('super_admin') || $user->can('client.list')) {
            $customers =$query->paginate(25)->appends(request()->query());
            return view('backend.customer.index', compact('customers'));
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('client.create')) {
            $districts = District::all();
            return view('backend.customer.create-new', compact('districts'));
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'name_bn' => 'required|string|max:100',
            'father_name_en' => 'required|string|max:100',
            'father_name_bn' => 'required|string|max:100',
            'mother_name_en' => 'required|string|max:100',
            'mother_name_bn' => 'required|string|max:100',
            'mobile_number' => 'required|numeric|unique:customers,mobile_number',
//            'phone' => 'required|numeric|unique:customers,phone',
//            'email' => 'required|email|max:100',
//            'address' => 'required|string|max:255',
//            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        //dd($request->all());


        $lastCustomer = Customer::orderBy('id', 'desc')->first();


        if ($lastCustomer) {
            $lastIdNumber = $lastCustomer->client_number;
            $newIdNumber = $lastIdNumber + 1;
        } else {
            $newIdNumber = 1;
        }

        $customer = new Customer();
        $customer->client_number = str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);
        $customer->name = $request->name;
        $customer->name_bn = $request->name_bn;
        $customer->father_name_en = $request->father_name_en;
        $customer->father_name_bn = $request->father_name_bn;
        $customer->mother_name_en = $request->mother_name_en;
        $customer->mother_name_bn = $request->mother_name_bn;
        $customer->husband_or_wife_name_en = $request->husband_or_wife_name_en;
        $customer->husband_or_wife_name_bn = $request->husband_or_wife_name_bn;
        $customer->present_address_en = $request->present_address_en;
        $customer->present_address_bn = $request->present_address_bn;
        $customer->permanent_address_en = $request->permanent_address_en;
        $customer->permanent_address_bn = $request->permanent_address_bn;
        $customer->district_id = $request->district_id;
        $customer->thana_id = $request->thana_id;
        $customer->village_bn = $request->village_bn;
        $customer->post_office_bn = $request->post_office_bn;
        $customer->phone = $request->phone;
        $customer->mobile_number = $request->mobile_number;
        $customer->email = $request->email;
        $customer->nid_number = $request->nid_number;
        $customer->passport_number = $request->passport_number;
        $customer->tin_number = $request->tin_number;
        $customer->dob = $request->dob;
        $customer->blood_group = $request->blood_group;
        $customer->occupation = $request->occupation;
        $customer->date = $request->date;
        $customer->password = Hash::make('12345678');

        if ($request->hasFile('image')) {
            $imageFile1 = $request->file('image');
            $width1 = 400;
            $height1 = 400;
            $folder1 = 'backend/images/customer/';
            $customer->image = $this->uploadImage($imageFile1, $width1, $height1, $folder1, 75);
        }

        if ($request->hasFile('signature_image')) {
            $imageFile = $request->file('signature_image');
            $width = 100;
            $height = 100;
            $folder = 'backend/images/customer/';
            $customer->signature_image = $this->uploadImage($imageFile, $width, $height, $folder, 75);
        }

        $customer->save();

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Customer::find($id);
        return view('backend.customer.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('client.edit')) {
            $client = Customer::find($id);
            $districts = District::all();
            $thanas = Thana::all();
            return view('backend.customer.edit', compact('districts', 'client', 'thanas'));
        }
        else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'name_bn' => 'required|string|max:100',
            'father_name_en' => 'required|string|max:100',
            'father_name_bn' => 'required|string|max:100',
            'mother_name_en' => 'required|string|max:100',
            'mother_name_bn' => 'required|string|max:100',
            'mobile_number' => 'required|numeric',
            //'phone' => 'required|numeric',
//            'email' => 'required|email|max:100',
//            'address' => 'required|string|max:255',
//            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2000',
        ]);

        //dd($request->all());

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->name_bn = $request->name_bn;
        $customer->father_name_en = $request->father_name_en;
        $customer->father_name_bn = $request->father_name_bn;
        $customer->mother_name_en = $request->mother_name_en;
        $customer->mother_name_bn = $request->mother_name_bn;
        $customer->husband_or_wife_name_en = $request->husband_or_wife_name_en;
        $customer->husband_or_wife_name_bn = $request->husband_or_wife_name_bn;
        $customer->present_address_en = $request->present_address_en;
        $customer->present_address_bn = $request->present_address_bn;
        $customer->permanent_address_en = $request->permanent_address_en;
        $customer->permanent_address_bn = $request->permanent_address_bn;
        $customer->district_id = $request->district_id;
        $customer->thana_id = $request->thana_id;
        $customer->village_bn = $request->village_bn;
        $customer->post_office_bn = $request->post_office_bn;
        $customer->phone = $request->phone;
        $customer->mobile_number = $request->mobile_number;
        $customer->email = $request->email;
        $customer->nid_number = $request->nid_number;
        $customer->passport_number = $request->passport_number;
        $customer->tin_number = $request->tin_number;
        $customer->dob = $request->dob;
        $customer->blood_group = $request->blood_group;
        $customer->occupation = $request->occupation;
        $customer->date = $request->date;
        $customer->password = Hash::make('12345678');


        if ($request->hasFile('image')) {
            if ($customer->image) {
                $this->deleteOne('backend/images/customer/', $customer->image);
            }

            $imageFile1 = $request->file('image');
            $width1 = 400;
            $height1 = 400;
            $folder1 = 'backend/images/customer/';
            $customer->image = $this->uploadImage($imageFile1, $width1, $height1, $folder1, 75);
        }


        if ($request->hasFile('signature_image')) {
            if ($customer->signature_image) {
                $this->deleteOne('backend/images/customer/', $customer->signature_image);
            }

            $imageFile = $request->file('signature_image');
            $width = 100;
            $height = 100;
            $folder = 'backend/images/customer/';
            $customer->signature_image = $this->uploadImage($imageFile, $width, $height, $folder, 75);
        }

        $customer->save();

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('client.delete')) {
            $customer = Customer::findOrFail($id);

            $directory = 'backend/images/customer';
            $filename = $customer->image;
            $filename1 = $customer->signature_image;
            $this->deleteOne($directory, $filename);
            $this->deleteOne($directory, $filename1);

            $customer->delete();

            return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }

    }


    public function exportPDF()
    {
        $user = auth()->user();
        if ($user->hasRole('super_admin') || $user->can('client.pdf')) {
            $customers = Customer::get();
            $pdf = Pdf::loadView('backend.customer.pdf', compact('customers'))->setPaper('A4', 'landscape');
            return $pdf->download('client-list.pdf');
        } else {
            return redirect()->back()->with('error', 'You dont have permission!');
        }

    }


    public function downloadPDF(Request $request)
    {
        $query = Customer::query();
        $perPage = 25;
        $currentPage = $request->input('page', 1);

        $customers = $query->paginate($perPage, ['*'], 'page', $currentPage);

        $pdf = Pdf::loadView('backend.customer.download-pdf', compact('customers'))->setPaper('A4', 'landscape');

        return $pdf->download('clients.pdf');
    }


    public function getThanas(Request $request)
    {
        $thanas = Thana::where('district_id', $request->district_id)->pluck('bn_name', 'id');
        return response()->json($thanas);
    }

    //client csv
    public function exportclient()
    {
        return Excel::download(new ClientsExport, 'clients.csv');
    }


    public function allStatement(Request $request)
    {
        $user = auth()->user();
        $clients = Customer::all();
        $query = MemberAccountStatement::query();

        $combinedStatements = [];
        $totalDeposit = 0;
        $totalWithdraw = 0;
        $cumulativeBalance = 0;

        if ($request->filled('client_name')) {
            $clientName = $request->input('client_name');
            $query->whereHas('memberAccount', function ($query) use ($clientName) {
                $query->whereHas('customer', function ($query) use ($clientName) {
                    $query->where('name', 'like', '%' . $clientName . '%');
                });
            });
        }

        $client1 = $request->filled('client_name') ? Customer::where('name', $request->input('client_name'))->first() : null;

        if ($request->filled(['start_date', 'end_date'])) {
            try {
                $startDate = Carbon::createFromFormat('d/m/Y', $request->input('start_date'))->startOfDay();
                $endDate = Carbon::createFromFormat('d/m/Y', $request->input('end_date'))->endOfDay();
                $query->whereDate('date', '>=', $startDate)->whereDate('date', '<=', $endDate);
            } catch (\Exception $e) {
                return back()->withErrors(['date_format' => 'Invalid date format. Please use DD/MM/YYYY.']);
            }
        }

        if ($request->filled(['start_date', 'end_date']) && $request->filled('client_name')) {
            $membershipAccountIds = MembershipAccount::where('client_id', $client1->client_number ?? null)->pluck('id');

            $memberStatements = $query
                ->whereIn('membership_account_id', $membershipAccountIds)
                ->orderBy('membership_account_id', 'asc')
                ->orderBy('date', 'asc')
                ->get();

            $cumulativeBalance = MemberAccountStatement::whereIn('membership_account_id', $membershipAccountIds)
                ->where('deposit', '=', 0)
                ->where('withdraw', '=', 0)
                ->sum('balance');

            foreach ($memberStatements as $statement) {
                $membershipAccount = MembershipAccount::find($statement->membership_account_id);
                $accountNumber = $membershipAccount ? $membershipAccount->account_number : 'N/A';

                $deposit = $statement->deposit ?? 0;
                $withdraw = $statement->withdraw ?? 0;
                $cumulativeBalance += $deposit - $withdraw;

                // Ensure each statement is an array
                $combinedStatements[] = [
                    'date' => Carbon::parse($statement->date)->format('d-m-Y'),
                    'particular' => $statement->particular,
                    'receipt_number' => $statement->receipt_number,
                    'account_number' => $accountNumber,
                    'deposit' => $deposit,
                    'withdraw' => $withdraw,
                    'balance' => $cumulativeBalance,
                ];

                $totalDeposit += $deposit;
                $totalWithdraw += $withdraw;
            }

            // Handle Opening Balance logic
            $paginatedCombinedStatements = collect($combinedStatements ?? []);

            $openingBalance = $paginatedCombinedStatements->firstWhere('particular', 'Opening Balance');
            $otherStatements = $paginatedCombinedStatements->where('particular', '!=', 'Opening Balance');

            $paginatedCombinedStatements = collect([$openingBalance])->filter()->merge($otherStatements);

            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 25;
            $currentItems = array_slice($paginatedCombinedStatements->toArray(), ($currentPage - 1) * $perPage, $perPage);
            $paginatedCombinedStatements = new LengthAwarePaginator(
                $currentItems,
                count($paginatedCombinedStatements),
                $perPage,
                $currentPage,
                ['path' => $request->url(), 'query' => $request->query()]
            );
        } else {
            $memberStatements = $query->paginate(25)->appends(request()->query());
            $paginatedCombinedStatements = null;
        }

        if ($user->hasRole('super_admin') || $user->can('membership-account.statement')) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $report_taken_time = Carbon::now()->format('d/m/Y') . ' ' . Carbon::now()->addHours(6)->format('g:i A');

            return view('backend.customer.statement.all-statement', compact(
                'clients',
                'memberStatements',
                'start_date',
                'end_date',
                'report_taken_time',
                'client1',
                'paginatedCombinedStatements',
                'cumulativeBalance',
                'totalDeposit',
                'totalWithdraw'
            ));
        } else {
            return redirect()->back()->with('error', 'You do not have permission!');
        }
    }





    public function clientStatement(Request $request, $id)
    {
        $query = MemberAccountStatement::query();

        // Handle date range filtering
        if ($request->filled(['start_date', 'end_date'])) {
            try {
                $startDate = Carbon::createFromFormat('d/m/Y', $request->input('start_date'))->startOfDay();
                $endDate = Carbon::createFromFormat('d/m/Y', $request->input('end_date'))->endOfDay();
                $query->whereBetween('date', [$startDate, $endDate]);
            } catch (\Exception $e) {
                return back()->withErrors(['date_format' => 'Invalid date format. Please use DD/MM/YYYY.']);
            }
        }

        $client = Customer::findOrFail($id);
        $membershipAccountIds = MembershipAccount::where('client_id', $client->client_number)->pluck('id');

        $memberStatements = $query
            ->whereIn('membership_account_id', $membershipAccountIds)
            ->orderBy('membership_account_id', 'asc')
            ->orderBy('date', 'asc')
            ->paginate(25)
            ->appends(request()->query());

        // Calculate cumulative balance for combined accounts
        $combinedStatements = [];
        $totalDeposit = 0;
        $totalWithdraw = 0;
        $cumulativeBalance = MemberAccountStatement::where('deposit', '=', 0) ->whereIn('membership_account_id', $membershipAccountIds)
            ->orderBy('membership_account_id', 'asc')->where('withdraw', '=', 0)->sum('balance');


        foreach ($memberStatements as $statement) {
            $membershipAccount = MembershipAccount::find($statement->membership_account_id);
            $accountNumber = $membershipAccount ? $membershipAccount->account_number : 'N/A';

            $deposit = $statement->deposit ?? 0;
            $withdraw = $statement->withdraw ?? 0;
            $cumulativeBalance += $deposit - $withdraw;

            $combinedStatements[] = [
                'date' => Carbon::parse($statement->date)->format('d-m-Y'),
                'particular' => $statement->particular,
                'receipt_number' => $statement->receipt_number,
                'account_number' => $accountNumber,
                'deposit' => $deposit,
                'withdraw' => $withdraw,
                'balance' => $cumulativeBalance,
            ];

            $totalDeposit += $deposit;
            $totalWithdraw += $withdraw;
        }


        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $report_taken_time = Carbon::now()->format('d/m/Y').' '.Carbon::now()->addHours(6)->format('g:i A');

        return view('backend.customer.statement.view', compact(
            'client',
            'combinedStatements',
            'memberStatements',
            'totalDeposit',
            'totalWithdraw',
            'cumulativeBalance',
            'start_date',
            'end_date',
            'report_taken_time'
        ));
    }



    public function exportClientStatementPDF($id)
    {
        $client = Customer::findOrFail($id);
        $membershipAccount = MembershipAccount::where('client_id', $client->client_number)->pluck('id');
        $memberStatements = MemberAccountStatement::whereIn('membership_account_id', $membershipAccount)
            ->orderBy('membership_account_id', 'asc')
            ->get();

        $combinedStatements = [];
        $totalDeposit = 0;
        $totalWithdraw = 0;
        $cumulativeBalance = MemberAccountStatement::where('deposit', '=', 0)  ->whereIn('membership_account_id', $membershipAccount)
            ->orderBy('membership_account_id', 'asc')->where('withdraw', '=', 0)->sum('balance');

        foreach ($memberStatements as $statement) {
            $membershipAccount = MembershipAccount::find($statement->membership_account_id);
            $accountNumber = $membershipAccount ? $membershipAccount->account_number : 'N/A';

            $deposit = $statement->deposit ?? 0;
            $withdraw = $statement->withdraw ?? 0;
            $cumulativeBalance += $deposit - $withdraw;

            $combinedStatements[] = [
                'date' => Carbon::parse($statement->date)->format('d-m-Y'),
                'particular' => $statement->particular,
                'receipt_number' => $statement->receipt_number,
                'account_number' => $accountNumber,
                'deposit' => $deposit,
                'withdraw' => $withdraw,
                'balance' => $cumulativeBalance,
            ];

            $totalDeposit += $deposit;
            $totalWithdraw += $withdraw;
        }


        $report_taken_time = Carbon::now()->format('d/m/Y').' '.Carbon::now()->addHours(6)->format('g:i A');
        $pdf = Pdf::loadView('backend.customer.statement.statement-pdf', compact( 'client',
            'combinedStatements',
            'memberStatements',
            'totalDeposit',
            'totalWithdraw',
            'cumulativeBalance',
            'report_taken_time'))->setPaper('A4', 'landscape');;
        return $pdf->download('customer-statement.pdf');
    }


    public function clientStatementDownload(Request $request, $id)
    {
        $query = MemberAccountStatement::query();
        $perPage = 25;


        $currentPage = $request->input('page', 1);

        $client = Customer::findOrFail($id);

        $membershipAccountIds = MembershipAccount::where('client_id', $client->client_number)->pluck('id');
        $memberStatements = $query->whereIn('membership_account_id', $membershipAccountIds)
            ->orderBy('membership_account_id', 'asc')
            ->paginate($perPage, ['*'], 'page', $currentPage);

        // Calculate cumulative balance for combined accounts
        $combinedStatements = [];
        $totalDeposit = 0;
        $totalWithdraw = 0;
        $cumulativeBalance = MemberAccountStatement::where('deposit', '=', 0)  ->whereIn('membership_account_id', $membershipAccountIds)
            ->orderBy('membership_account_id', 'asc')->where('withdraw', '=', 0)->sum('balance');

        foreach ($memberStatements as $statement) {
            $membershipAccount = MembershipAccount::find($statement->membership_account_id);
            $accountNumber = $membershipAccount ? $membershipAccount->account_number : 'N/A';

            $deposit = $statement->deposit ?? 0;
            $withdraw = $statement->withdraw ?? 0;
            $cumulativeBalance += $deposit - $withdraw;

            $combinedStatements[] = [
                'date' => Carbon::parse($statement->date)->format('d-m-Y'),
                'particular' => $statement->particular,
                'receipt_number' => $statement->receipt_number,
                'account_number' => $accountNumber,
                'deposit' => $deposit,
                'withdraw' => $withdraw,
                'balance' => $cumulativeBalance,
            ];

            $totalDeposit += $deposit;
            $totalWithdraw += $withdraw;
        }



        $report_taken_time = Carbon::now()->format('d/m/Y').' '.Carbon::now()->addHours(6)->format('g:i A');
        $pdf = Pdf::loadView(
            'backend.customer.statement.statement-single-pdf',
            compact( 'client',
                'combinedStatements',
                'memberStatements',
                'totalDeposit',
                'totalWithdraw',
                'cumulativeBalance',
                'report_taken_time')
        )->setPaper('A4', 'landscape');

        return $pdf->download("statement-page-{$currentPage}.pdf");
    }


}
