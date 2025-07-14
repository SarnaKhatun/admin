@extends('backend.layouts.master')
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
                        <a href="#">Permission Modules</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-title">Permission Module List</div>
                                <div class="ms-md-auto py-0 py-md-0">
                                    @role('super_admin')
                                    <a href="{{ url('permission-modules/create') }}" class="btn btn-primary btn-sm">Add
                                        Module</a>
                                    @else
                                        @can('module.create')
                                            <a href="{{ url('permission-modules/create') }}"
                                               class="btn btn-primary btn-sm">Add Module</a>
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
                                        <th>Name</th>
{{--                                        @role('super_admin')--}}
{{--                                        <th width="40%">Action</th>--}}
{{--                                        @else--}}
{{--                                            @canany(['module.edit', 'module.delete'])--}}
{{--                                                <th width="40%">Action</th>--}}
{{--                                            @endcanany--}}
{{--                                            @endrole--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($permission_modules as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
{{--                                            @role('super_admin')--}}
{{--                                            <td>--}}

{{--                                                @role('super_admin')--}}
{{--                                                <a href="{{ url('permission-modules/'.$permission->id.'/edit') }}"--}}
{{--                                                   class="btn btn-success">Edit</a>--}}
{{--                                                @else--}}
{{--                                                    @can('module.edit')--}}
{{--                                                        <a href="{{ url('permission-modules/'.$permission->id.'/edit') }}"--}}
{{--                                                           class="btn btn-success">Edit</a>--}}
{{--                                                    @endcan--}}
{{--                                                    @endrole--}}
{{--                                                    @role('super_admin')--}}
{{--                                                    <a href="{{ url('permission-modules/'.$permission->id.'/delete') }}"--}}
{{--                                                       class="btn btn-danger mx-2">Delete</a>--}}
{{--                                                    @else--}}
{{--                                                        @can('module.delete')--}}
{{--                                                            <a href="{{ url('permission-modules/'.$permission->id.'/delete') }}"--}}
{{--                                                               class="btn btn-danger mx-2">Delete</a>--}}
{{--                                                        @endcan--}}
{{--                                                        @endrole--}}
{{--                                            </td>--}}
{{--                                            @else--}}
{{--                                                @canany(['module.edit', 'module.delete'])--}}
{{--                                                    <td>--}}

{{--                                                        @role('super_admin')--}}
{{--                                                        <a href="{{ url('permission-modules/'.$permission->id.'/edit') }}"--}}
{{--                                                           class="btn btn-success">Edit</a>--}}
{{--                                                        @else--}}
{{--                                                            @can('module.edit')--}}
{{--                                                                <a href="{{ url('permission-modules/'.$permission->id.'/edit') }}"--}}
{{--                                                                   class="btn btn-success">Edit</a>--}}
{{--                                                            @endcan--}}
{{--                                                            @endrole--}}
{{--                                                            @role('super_admin')--}}
{{--                                                            <a href="{{ url('permission-modules/'.$permission->id.'/delete') }}"--}}
{{--                                                               class="btn btn-danger mx-2">Delete</a>--}}
{{--                                                            @else--}}
{{--                                                                @can('module.delete')--}}
{{--                                                                    <a href="{{ url('permission-modules/'.$permission->id.'/delete') }}"--}}
{{--                                                                       class="btn btn-danger mx-2">Delete</a>--}}
{{--                                                                @endcan--}}
{{--                                                                @endrole--}}
{{--                                                    </td>--}}
{{--                                                @endcanany--}}
{{--                                                @endrole--}}
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

