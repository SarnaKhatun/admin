@extends('backend.layouts.master')
@section('title', 'Module Create')
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
                        <a href="#">Permission Module</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Permission Module
                                @role('super_admin')
                                <a href="{{ url('permission-modules') }}" class="btn btn-primary btn-sm float-end">Back</a>
                                @else
                                    @can('module.list')
                                        <a href="{{ url('permission-modules') }}" class="btn btn-primary btn-sm float-end">Back</a>
                                    @endcan
                                    @endrole
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('permission-modules') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="">Module Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" />
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

