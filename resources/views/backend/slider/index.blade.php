@extends('backend.layouts.master')
@section('title', 'Slider List')
@section('content')
    <style>

        @media only screen and (max-width: 600px) {


            .client {
                flex-direction: column
            }
        }

        table.display.table.table-striped.table-hover thead tr th {
            background: #E2EFDA;
            padding: 10px !important;
            border-top: 2px solid #000 !important;
            border-bottom: 2px solid #000 !important;
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
                                <div class="card-title">Slider List</div>
                                {{--                                <div class="ms-md-auto py-0 py-md-0 d-flex flex-row gap-2  flex-wrap">--}}
                                <div class="ms-md-auto py-0 py-md-0">
                                    @role('super_admin')
                                    <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">Add New</a>
                                    @else
                                        @can('client.create')
                                            <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">Add
                                                New</a>
                                        @endcan
                                        @endrole
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 d-flex">
                                    <input type="text" id="search_items" class="form-control"
                                           placeholder="Search with Client Id, Name, Phone, NID Number">
                                    <button id="client_items" class="btn-sm btn btn-primary d-flex align-items-center">
                                        <i class="fas fa-search me-2"></i> Search
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Slider Name</th>
                                        <th>URL</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($sliders as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{asset('storage/'.$row->image)}}" alt=""
                                                     style="height: 70px; width: 70px">
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->url }}</td>
                                            <td>{{ $row->status == 1 ? 'Active':'Inactive' }}</td>
                                            <td>{{ \Illuminate\Support\Str::words($row->description, 5, '...') }}</td>
                                            <td>{{ $row->dob ? \Carbon\Carbon::parse($row->dob)->format('d-m-Y') : '' }}
                                            </td>
                                            @role('super_admin')
                                            <td>
                                                <a href=""
                                                   class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action=""
                                                      method="POST"
                                                      style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this client?');">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
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

