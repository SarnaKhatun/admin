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
                        <a href="#">Monthly Collections</a>
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

                            @if(count($results['monthly_collections']) > 0)
                                <div class="row">
                                    <div class="col-12">
                                        <table class="display table-hover table-striped table table-responsive-sm table-bordered  active-projects style-1">
                                            <thead>
                                            <tr>
                                                <th>Account No.</th>
                                                <th>Account Name</th>
                                                <th>Director Name</th>
                                                <th>Scheme</th>
                                                <th>Total Collection</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($results['monthly_collections'] as $row)
                                                <tr>
                                                    <td>{{ $row->membershipAccount->account_number ?? '' }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('monthly-collections.show', $row->id) }}">{{ $row->membershipAccount->name }}</a>
                                                    </td>
                                                    <td>{{ $row->membershipAccount->director->name ?? '' }}</td>
                                                    <td>{{ $row->package->name ?? '' }}-{{ $row->package_value ?? '' }}
                                                    </td>
                                                    <td>{{ $row->total_amount }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <p>There's no monthly collection data found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



