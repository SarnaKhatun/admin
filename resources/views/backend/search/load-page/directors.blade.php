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
                        <a href="#">Directors</a>
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

                            @if(count($results['directors']) > 0)
                                <div class="row">
                                    <div class="col-12">
                                        <table class="display table-hover table-striped table table-responsive-sm table-bordered  active-projects style-1">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Address</th>
                                                <th>DOB</th>
                                                <th>NID</th>
                                                <th>Member Count</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($results['directors'] as $director)
                                                <tr>
                                                    <td>
                                                        @if ($director->image)
                                                            <img src="{{ url('backend/images/director/' . $director->image) }}"
                                                                 alt="customer" width="50">
                                                        @else
                                                            <img src="{{ url('backend/images/no-image.png') }}" alt="customer"
                                                                 width="50">
                                                        @endif
                                                    </td>
                                                    <td>{{ $director->name ?? '' }}</td>
                                                    <td>{{ $director->phone ?? '' }}</td>
                                                    <td>{{ $director->email ?? '' }}</td>
                                                    <td>{{ $director->occupation }}</td>
                                                    <td>{!! $director->present_address ?? '' !!}</td>
                                                    <td>{{ $director->dob ? \Carbon\Carbon::parse($director->dob)->format('d-m-Y') : '' }}
                                                    </td>
                                                    <td>{{ $director->nid_number ?? '' }}</td>
                                                    @php
                                                        $membershipCount = \App\Models\MembershipAccount::where(
                                                            'director_id',
                                                            '=',
                                                            $director->id,
                                                        )->count();
                                                    @endphp
                                                    <td><a href="#"
                                                           class="btn btn-sm btn-rounded btn-light">{{ $membershipCount ?? '' }}</a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <p>There's no director data found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



