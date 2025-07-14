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
                        <a href="#">Clients</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between client">
                                <div class="card-title">Client Lists</div>
                            </div>
                        </div>


                        <div class="card-body">

                            @if(count($results['clients']) > 0)
                                <div class="row">
                                    <div class="col-12">
                                        <table class="display table-hover table-striped table table-responsive-sm table-bordered  active-projects style-1">
                                            <thead>
                                            <tr>
                                                <th>Client ID</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>NID</th>
                                                <th>DOB</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($results['clients'] as $row)
                                                <tr>
                                                    <td>{{ $row->client_number }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->phone }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ $row->nid_number }}</td>
                                                    <td>{{ $row->dob ? \Carbon\Carbon::parse($row->dob)->format('d-m-Y') : '' }}</td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <p>There's no client data found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



