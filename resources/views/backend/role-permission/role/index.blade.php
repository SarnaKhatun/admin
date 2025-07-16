@extends('backend.layouts.master')
@section('title', 'Role List')
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
                        <a href="#">Roles</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-title">Role List</div>
                                <div class="ms-md-auto py-0 py-md-0">
                                    @role('super_admin')
                                        <a href="{{ url('roles/create') }}" class="btn btn-primary btn-sm float-end">Add Role</a>
                                    @else
                                        @can('role.create')
                                            <a href="{{ url('roles/create') }}" class="btn btn-primary btn-sm float-end">Add
                                                Role</a>
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
                                            @role('super_admin')
                                                <th width="40%">Action</th>
                                            @else
                                                @canany(['role.add/edit-role-permission', 'role.edit', 'role.delete'])
                                                    <th width="40%">Action</th>
                                                @endcanany
                                            @endrole
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>
                                                @role('super_admin')
                                                    <td style="display: flex;gap:5px">
                                                        @if ($role->name != 'super_admin')
                                                            @role('super_admin')
                                                                <a href="{{ url('roles/' . $role->id . '/give-permissions') }}"
                                                                    style="width: max-content" class="btn btn-warning btn-sm">
                                                                    Add / Edit Role Permission
                                                                </a>
                                                            @else
                                                                @can('role.add/edit-role-permission')
                                                                    <a href="{{ url('roles/' . $role->id . '/give-permissions') }}"
                                                                        style="width: max-content" class="btn btn-warning btn-sm">
                                                                        Add / Edit Role Permission
                                                                    </a>
                                                                @endcan
                                                            @endrole

                                                            @role('super_admin')
                                                                <a href="{{ url('roles/' . $role->id . '/edit') }}"
                                                                    style="width: max-content" class="btn btn-primary btn-sm">
                                                                    Edit
                                                                </a>
                                                            @else
                                                                @can('role.edit')
                                                                    <a href="{{ url('roles/' . $role->id . '/edit') }}"
                                                                        style="width: max-content" class="btn btn-primary btn-sm">
                                                                        Edit
                                                                    </a>
                                                                @endcan
                                                            @endrole
{{--                                                            @role('super_admin')--}}
{{--                                                                <a href="{{ url('roles/' . $role->id . '/delete') }}"--}}
{{--                                                                    style="width: max-content" class="btn btn-danger btn-sm">--}}
{{--                                                                    Delete--}}
{{--                                                                </a>--}}
{{--                                                            @else--}}
{{--                                                                @can('role.delete')--}}
{{--                                                                    <a href="{{ url('roles/' . $role->id . '/delete') }}"--}}
{{--                                                                        style="width: max-content" class="btn btn-danger btn-sm">--}}
{{--                                                                        Delete--}}
{{--                                                                    </a>--}}
{{--                                                                @endcan--}}
{{--                                                            @endrole--}}
                                                        @else
                                                            <p>All Permission Have Access.</p>
                                                        @endif
                                                    </td>
                                                @else
                                                    @canany(['role.add/edit-role-permission', 'role.edit', 'role.delete'])
                                                        <td style="display: flex;gap:5px">
                                                            @if ($role->name != 'super_admin')
                                                                @role('super_admin')
                                                                    <a href="{{ url('roles/' . $role->id . '/give-permissions') }}"
                                                                        style="width: max-content" class="btn btn-warning btn-sm">
                                                                        Add / Edit Role Permission
                                                                    </a>
                                                                @else
                                                                    @can('role.add/edit-role-permission')
                                                                        <a href="{{ url('roles/' . $role->id . '/give-permissions') }}"
                                                                            style="width: max-content" class="btn btn-warning btn-sm">
                                                                            Add / Edit Role Permission
                                                                        </a>
                                                                    @endcan
                                                                @endrole

                                                                @role('super_admin')
                                                                    <a href="{{ url('roles/' . $role->id . '/edit') }}"
                                                                        style="width: max-content" class="btn btn-primary btn-sm">
                                                                        Edit
                                                                    </a>
                                                                @else
                                                                    @can('role.edit')
                                                                        <a href="{{ url('roles/' . $role->id . '/edit') }}"
                                                                            style="width: max-content" class="btn btn-primary btn-sm">
                                                                            Edit
                                                                        </a>
                                                                    @endcan
                                                                @endrole
{{--                                                                @role('super_admin')--}}
{{--                                                                    <a href="{{ url('roles/' . $role->id . '/delete') }}"--}}
{{--                                                                        style="width: max-content" class="btn btn-danger btn-sm">--}}
{{--                                                                        Delete--}}
{{--                                                                    </a>--}}
{{--                                                                @else--}}
{{--                                                                    @can('role.delete')--}}
{{--                                                                        <a href="{{ url('roles/' . $role->id . '/delete') }}"--}}
{{--                                                                            style="width: max-content" class="btn btn-danger btn-sm">--}}
{{--                                                                            Delete--}}
{{--                                                                        </a>--}}
{{--                                                                    @endcan--}}
{{--                                                                @endrole--}}
                                                            @else
                                                                <p>All Permission Have Access.</p>
                                                            @endif
                                                        </td>
                                                    @endcanany
                                                @endrole
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
