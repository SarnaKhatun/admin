@extends('backend.layouts.master')
@section('title', isset($service_cate) ? 'Service Category Edit' : 'Service Category Add')
@section('content')
    <style>
        .form-check,
        .form-group {
            padding: 0;
        }

        .select2-container--default .select2-selection--single {
            border: 2px solid #ebedf2;
        }

        .select2-container .select2-selection--single {
            height: 40px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 70%;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }
    </style>
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4>Service Category</h4>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-title">
                                    {{ isset($service_cate) ? 'Service Category Edit' : 'Service Category Add'}}
                                </div>
                                <div class="py-0 ms-md-auto py-md-0">
                                    @role('super_admin')
                                    <a href="{{ route('service-category.index') }}" class="btn btn-primary btn-sm">Back</a>
                                    @else
                                        @can('service-category.list')
                                            <a href="{{ route('service-category.index') }}" class="btn btn-primary btn-sm">Back</a>
                                        @endcan
                                        @endrole
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{isset($service_cate) ? route('service-category.update', $service_cate->id) : route('service-category.store') }}" method="POST">
                                @csrf
                                <div class="row g-2">
                                    <!-- name -->
                                    <div class="col-12 col-md-6 col-lg-8 offset-lg-2">
                                        <div class="form-group">
                                            <label for="name">Name <span style="color: red">*</span></label>
                                            <input type="text" name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name', isset($service_cate) ? $service_cate->name: '') }}">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 175px">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
