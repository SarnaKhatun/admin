@extends('customer.layouts.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Monthly Collection Ledger View</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt- pb-0">
                                <div class="card-title">Monthly Collection Ledger</div>
                                <div class="ms-md-auto py-0 py-md-0">
                                    <a href="{{ route('customer.monthly-subscription-fees.index')  }}" class="btn btn-primary btn-sm">Back List</a>
                                    <a href="{{ route('customer.monthly-subscription-fee-ledger.pdf', $id)  }}" class="btn btn-info btn-sm">Download PDF</a>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Account Number</th>
                                        <th>Account Name</th>
                                        <th>Date Range</th>
                                        <th>Monthly Taka</th>
                                        <th>Due Taka</th>
                                        <th>Advanced Taka</th>
                                        <th>Created Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($monthlySubscriptionFeeLedger as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->monthlySubscriptionFee->membershipAccount->account_number }}</td>
                                                <td>{{ $row->monthlySubscriptionFee->membershipAccount->name }}</td>
                                                <td>{{ $row->date_range ?? '' }}</td>
                                                <td>{{ $row->monthly_amount ?? '0.00' }}</td>
                                                <td>{{ $row->due_amount ?? '0.00' }}</td>
                                                <td>{{ $row->advanced_amount ?? '0.00' }}</td>
                                                <td>{{ $row->created_at->format('d M Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
