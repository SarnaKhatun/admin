@extends('backend.layouts.master')
@section('title', 'Service List')
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
                        <a href="#">Service</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between client">
                                <div class="card-title">Service List</div>
                                {{--                                <div class="ms-md-auto py-0 py-md-0 d-flex flex-row gap-2  flex-wrap">--}}
                                <div class="ms-md-auto py-0 py-md-0">
                                    @role('super_admin')
                                    <a href="{{ route('service.create') }}" class="btn btn-primary btn-sm">Add New</a>
                                    @else
                                        @can('service.create')
                                            <a href="{{ route('service.create') }}" class="btn btn-primary btn-sm">Add
                                                New</a>
                                        @endcan
                                        @endrole
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
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Heading</th>
                                        <th>URL</th>
                                        <th>Other Title</th>
                                        <th>Other Heading</th>
                                        <th>Status</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($services as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{asset('storage/'.$row->image)}}" alt=""
                                                     style="height: 70px; width: 70px">
                                            </td>
                                            <td>{{ $row->service_cate->name ?? '' }}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->heading }}</td>
                                            <td>{{ $row->url }}</td>
                                            <td>{{ $row->other_title }}</td>
                                            <td>{{ $row->other_heading }}</td>
                                            <td>
                                                <a href="{{route('service.status-change', $row->id)}}"
                                                   class="btn btn-sm btn-{{$row->status == 1 ? 'success': 'danger'}}">
                                                {{ $row->status == 1 ? 'Active':'Inactive' }}</td>
                                                </a>

                                            <td>{{ \Illuminate\Support\Str::words($row->details, 5, '...') }}</td>
                                            <td>
                                                <a href="{{ route('service.edit', $row->id) }}"
                                                   class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('service.delete', $row->id) }}"
                                                      method="POST"
                                                      style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this service?');">
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

