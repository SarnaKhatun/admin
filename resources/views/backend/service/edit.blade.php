@extends('backend.layouts.master')
@section('title', 'Service Edit')
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
                <h4>Slider</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-title">Create Service</div>
                                <div class="py-0 ms-md-auto py-md-0">
                                    @role('super_admin')
                                    <a href="{{ route('service.index') }}" class="btn btn-primary btn-sm">Back</a>
                                    @else
                                        @can('service.list')
                                            <a href="{{ route('service.index') }}" class="btn btn-primary btn-sm">Back</a>
                                        @endcan
                                        @endrole
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="category">Category Name</label>
                                            <select name="category_id" id="category"
                                                    class="form-control js-example-templating">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if($service->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- title -->
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="title">Title <span style="color: red">*</span></label>
                                            <input type="text" name="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title', $service->title) }}">
                                            @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="heading">Heading <span style="color: red">*</span></label>
                                            <input type="text" name="heading"
                                                   class="form-control @error('heading') is-invalid @enderror"
                                                   value="{{ old('heading', $service->heading) }}">
                                            @error('heading')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="url">URL<span style="color: red">*</span></label>
                                            <input type="url" name="url"
                                                   class="form-control @error('url') is-invalid @enderror"
                                                   value="{{ old('url', $service->url) }}">
                                            @error('url')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="other_title">Other Title<span style="color: red">*</span></label>
                                            <input type="text" name="other_title"
                                                   class="form-control @error('other_title') is-invalid @enderror"
                                                   value="{{ old('other_title', $service->other_title) }}">
                                            @error('other_title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="other_heading">Other Heading<span style="color: red">*</span></label>
                                            <input type="text" name="other_heading"
                                                   class="form-control @error('other_heading') is-invalid @enderror"
                                                   value="{{ old('other_heading', $service->other_heading) }}">
                                            @error('other_heading')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Service Image -->
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="image" class="fw-bolder">Image</label>
                                            <input type="file" name="image"
                                                   class="@error('image') is-invalid @enderror" id="image"
                                                   onchange="previewImage(event)" />
                                            <div class="mt-2">

                                                @if (!empty($service->image))
                                                    <img id="imagePreview"
                                                         src="{{ asset('storage/' . $service->image) }}"
                                                         alt="Service Image" width="75">
                                                @else
                                                    <img id="imagePreview"
                                                         src="{{ asset('default.png') }}"
                                                         alt="No Image" width="75">
                                                @endif
                                            </div>
                                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <!--Details-->
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="details">Details<span style="color: red">*</span></label>
                                            <textarea name="details" id="" class="form-control @error('details') is-invalid @enderror" cols="" rows="4">{!! $service->details !!}</textarea>
                                            @error('details')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
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


<script>
    $(document).ready(function() {

        $(".js-example-templating").select2({
            placeholder: "Select",
            allowClear: true
        });
    });
</script>
@endpush
