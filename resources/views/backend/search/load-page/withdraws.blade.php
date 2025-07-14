@extends('backend.layouts.master')
@section('content')
    <style>

        @media only screen and (max-width: 600px) {


            .client {
                flex-direction: column
            }
        }
    </style>
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
                        <a href="#">Withdraws</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between client">
                                <div class="card-title"></div>
                            </div>
                        </div>


                        <div class="card-body">

                            @if(count($results['withdraws']) > 0)
                                <div class="row">
                                    <div class="col-12">
                                        <table class="display table-hover table-striped table table-responsive-sm table-bordered  active-projects style-1">
                                            <thead>
                                            <tr>
                                                <th>Account No</th>
                                                <th>Account Name</th>
                                                <th>Director Name</th>
                                                <th>Scheme</th>
                                                <th>Total Collection</th>
                                                <th>Month</th>
                                                <th>Withdraw Amount</th>
                                                <th>Payment Type</th>
                                                <th>Payment Method</th>
                                                <th>Account</th>
                                                <th>Note</th>
                                                <th>Created By</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($results['withdraws'] as $withdraw)
                                                <tr>
                                                    <td>{{$withdraw->member_number ?? ''}}</td>
                                                    <td>{{$withdraw->member_name ?? ''}}</td>
                                                    <td>{{$withdraw->director_name ?? ''}}</td>
                                                    <td>{{$withdraw->package}}</td>
                                                    <td>{{$withdraw->total_collection ?? ''}}</td>
                                                    <td>{{$withdraw->month ?? ''}}</td>
                                                    <td>{{$withdraw->withdraw_amount ?? ''}}</td>
                                                    <td>{{$withdraw->payment_type == 1 ? 'Cash/Bank/Mobile Banking' : 'Bkash'}}</td>
                                                    <td>{{$withdraw->payment_method->payment_method_name ?? ''}}</td>
                                                    <td>{{$withdraw->account->account_name ?? ''}}</td>
                                                    <td>{!! $withdraw->note ?? '' !!}</td>
                                                    <td>{{$withdraw->createdBy->name ?? ''}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <p>There's no withdraw data found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



