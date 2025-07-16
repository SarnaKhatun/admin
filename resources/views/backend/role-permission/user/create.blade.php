@extends('backend.layouts.master')
@section('title', 'User Create')
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
                        <a href="#">User</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create User
                                @role('super_admin')
                                    <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-end">Back</a>
                                @else
                                    @can('user.list')
                                        <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-end">Back</a>
                                    @endcan
                                @endrole
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('users') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Phone</label>
                                    <input type="number" name="phone" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Roles</label>
                                    <select name="roles[]" class="form-control">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
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
@push('scripts')
    <script type="text/javascript">
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
