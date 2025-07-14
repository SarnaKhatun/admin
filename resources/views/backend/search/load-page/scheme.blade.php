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
                        <a href="#">Scheme</a>
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

                            @if(count($results['schemes']) > 0)
                                <div class="row">
                                    <div class="col-12">
                                        <table class="display table-hover table-striped table table-responsive-sm table-bordered  active-projects style-1">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Value</th>
                                                <th>Created Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($results['schemes'] as $package)
                                                <tr>
                                                    <td>{{$package->name ?? ''}}</td>
                                                    <td>{{$package->value ?? ''}}</td>
                                                    <td>{{$package->created_date}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <p>There's no scheme data found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



