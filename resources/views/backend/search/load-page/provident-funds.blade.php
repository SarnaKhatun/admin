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
                        <a href="#">Provident Funds</a>
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

                            @if(count($results['provident_funds']) > 0)
                                <div class="row">
                                    <div class="col-12">
                                        <table class="display table-hover table-striped table table-responsive-sm table-bordered  active-projects style-1">
                                            <thead>
                                            <tr>
                                                <th>Member Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Total Amount</th>
                                                <th>Date</th>
                                                <th>Created By</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($results['provident_funds'] as $row)
                                                <tr>
                                                    <td>
                                                        @if($row->memberId)
                                                            <a href="{{ route('provident-funds.show', $row->id) }}">
                                                                {{ $row->memberId->name }}
                                                            </a>
                                                        @else
                                                            No member found
                                                        @endif
                                                    </td>
                                                    <td>{{ $row->phone }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{!! $row->address !!}</td>
                                                    <td>{{ $row->total_amount }}</td>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ $row->createdBy->name ?? '' }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <p>There's no provident fund data found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



