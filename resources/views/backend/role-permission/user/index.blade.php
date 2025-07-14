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
                        <a href="#">Users</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-title">User List</div>
                                <div class="ms-md-auto py-0 py-md-0">
                                    @role('super_admin')
                                        <a href="{{ url('users/create') }}" class="btn btn-primary btn-sm float-end">Add User</a>
                                    @else
                                        @can('user.create')
                                            <a href="{{ url('users/create') }}" class="btn btn-primary btn-sm float-end">Add
                                                User</a>
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
                                            <th>Email</th>
                                            <th>Roles</th>
                                            @role('super_admin')
                                                <th>Action</th>
                                            @else
                                                @canany(['user.edit', 'user.delete'])
                                                    <th>Action</th>
                                                @endcanany
                                            @endrole
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $rolename)
                                                            <label
                                                                class="badge bg-primary mx-1 text-white">{{ $rolename }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                @role('super_admin')
                                                    <td>
                                                        @role('super_admin')
                                                            <a href="{{ url('users/' . $user->id . '/edit') }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                        @else
                                                            @can('user.edit')
                                                                <a href="{{ url('users/' . $user->id . '/edit') }}"
                                                                    class="btn btn-primary btn-sm">Edit</a>
                                                            @endcan
                                                        @endrole
                                                        @if ($user->id != 1)
                                                            @role('super_admin')
                                                                <a href="{{ url('users/' . $user->id . '/delete') }}"
                                                                    class="btn btn-danger btn-sm mx-2">Delete</a>
                                                            @else
                                                                @canany('user.delete')
                                                                    <a href="{{ url('users/' . $user->id . '/delete') }}"
                                                                        class="btn btn-danger btn-sm mx-2">Delete</a>
                                                                @endcanany
                                                            @endrole
                                                        @endif


                                                    </td>
                                                @else
                                                    @canany(['user.edit', 'user.delete'])
                                                        <td>
                                                            @role('super_admin')
                                                                <a href="{{ url('users/' . $user->id . '/edit') }}"
                                                                    class="btn btn-primary btn-sm">Edit</a>
                                                            @else
                                                                @can('user.edit')
                                                                    <a href="{{ url('users/' . $user->id . '/edit') }}"
                                                                        class="btn btn-primary btn-sm">Edit</a>
                                                                @endcan
                                                            @endrole
                                                            @if ($user->id != 1)
                                                                @role('super_admin')
                                                                    <a href="{{ url('users/' . $user->id . '/delete') }}"
                                                                        class="btn btn-danger btn-sm mx-2">Delete</a>
                                                                @else
                                                                    @canany('user.delete')
                                                                        <a href="{{ url('users/' . $user->id . '/delete') }}"
                                                                            class="btn btn-danger btn-sm mx-2">Delete</a>
                                                                    @endcanany
                                                                @endrole
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
