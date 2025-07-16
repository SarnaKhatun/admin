@extends('backend.layouts.master')
@section('title', 'Edit Permission access')
@section('content')
    <style>
        .form-check,
        .form-group {
            padding: 0
        }

        .form-check.custom-checkbox.checkbox-success {
            display: flex;
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
                            <h4 style="display: flex;align-items:center; justify-content:space-between">Role :
                                {{ $role->name }}
                                <a href="{{ url('roles') }}" class="btn btn-primary btn-sm float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('roles/' . $role->id . '/give-permissions') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    @error('permission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <h2>Permissions</h2>

                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <div class="form-check custom-checkbox checkbox-success">
                                                <input type="checkbox" class="form-check-input" id="select_all_permissions">
                                                <label class="form-check-label" for="select_all_permissions">Select
                                                    All</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach ($modules as $moduleKey => $module)
                                            <div class="col-md-6 col-xl-4 mb-3">
                                                <h4>{{ $module->name ?? 'module_name' }}</h4>
                                                @foreach ($module->permission as $permKey => $permission)
                                                    @php
                                                        $isFirstInRow = $moduleKey === 0 && $permKey === 0;
                                                    @endphp
                                                    <div class="form-check custom-checkbox checkbox-success">
                                                        <input type="checkbox" class="form-check-input permission-checkbox"
                                                            id="check_{{ $permission->id }}" name="permission[]"
                                                            value="{{ $permission->name ?? '' }}"
                                                            {{ $isFirstInRow || in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="check_{{ $permission->id }}">{{ $permission->name ?? '' }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).on("click", "#select_all_permissions", function() {
            $('.permission-checkbox').prop('checked', $(this).prop('checked'));
        })

        $(document).on("click", ".permission-checkbox", function() {
            if ($('.permission-checkbox:checked').length == $('.permission-checkbox').length) {
                $('#select_all_permissions').prop('checked', true);
            } else {
                $('#select_all_permissions').prop('checked', false);
            }
        })
    </script>
@endpush
