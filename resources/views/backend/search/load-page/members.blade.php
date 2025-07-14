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
                        <a href="#">Members</a>
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

                            @if(count($results['members']) > 0)
                                <div class="row">
                                    <div class="col-12">
                                        <table class="display table-hover table-striped table table-responsive-sm table-bordered  active-projects style-1">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>client</th>
                                                <th>Reference(director)</th>
                                                <th>Scheme</th>
                                                <th>Opening Balance</th>
                                                <th>Account Name</th>
                                                <th>Account Number</th>
                                                <th>Phone</th>
                                                <th>Created Date</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($results['members'] as $row)
                                                <tr>
                                                    <td>
                                                        @if ($row->customer->image)
                                                            <img src="{{ url('backend/images/customer/' . $row->customer->image) }}"
                                                                 alt="member-image" width="50">
                                                        @else
                                                            <img src="{{ url('backend/images/no-image.png') }}"
                                                                 alt="member-image" width="50">
                                                        @endif
                                                    </td>
                                                    <td>{{ $row->customer->name ?? '' }}</td>
                                                    <td>{{ $row->director->name ?? '' }}</td>
                                                    <td>{{ $row->package->name ?? '' }}</td>
                                                    <td>{{ $row->opening_balance ?? '' }}</td>
                                                    <td>{{ $row->name ?? '' }}</td>
                                                    <td>{{ $row->account_number ?? '' }}</td>
                                                    <td>{{ $row->customer->phone ?? '' }}</td>
                                                    <td>{{ $row->created_at->format('d-m-Y') }}</td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <p>There's no member data found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



