@extends('backend.layouts.master')
@section('title', 'Permission List')
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
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Permissions</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt- pb-0">
                                <div class="card-title">Permission List</div>
                                <div class="ms-md-auto py-0 py-md-0">
                                    @role('super_admin')
                                    <a href="{{ url('permissions/create') }}" class="btn btn-primary btn-sm">Add Permission</a>
                                    @else
                                        @can('permission.create')
                                            <a href="{{ url('permissions/create') }}" class="btn btn-primary btn-sm">Add Permission</a>
                                        @endcan
                                        @endrole
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Module</th>
                                        <th>Name</th>
{{--                                        <th width="40%">Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->module->name ?? ''}}</td>
                                            <td>{{ $permission->name }}</td>
{{--                                            <td>--}}

{{--                                                <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>--}}



{{--                                                <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-sm btn-danger mx-2">Delete</a>--}}

{{--                                            </td>--}}
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

