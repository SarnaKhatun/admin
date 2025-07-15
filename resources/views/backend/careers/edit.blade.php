@extends('backend.layouts.master')
@section('title', 'Edit Career')
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
                <h4>Client</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-title">Edit Career</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('careers.update', $career ? $career->id : '')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Image -->
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="image" class="fw-bolder">Image(Preferred size: 400X400)</label>
                                            <input type="file" name="image"
                                                   class="@error('image') is-invalid @enderror" id="image"
                                                   onchange="previewImage(event)" />
                                            <div class="mt-2">

                                                @if (!empty($career->image))
                                                    <img id="imagePreview"
                                                         src="{{ asset('storage/' . $career->image) }}"
                                                         alt="career Image" width="75">
                                                @else
                                                    <img id="imagePreview"
                                                         src="{{ asset('default.png') }}"
                                                         alt="No Image" width="75">
                                                @endif
                                            </div>
                                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <!-- title -->
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="title" class="fw-bolder">Title <span style="color: red">*</span></label>
                                            <input type="text" name="title"
                                                   class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title', $career->title ?? '') }}">
                                            @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="heading" class="fw-bolder">Heading <span style="color: red">*</span></label>
                                            <input type="text" name="heading"
                                                   class="form-control @error('heading') is-invalid @enderror"
                                                   value="{{ old('heading', $career->heading ?? '') }}">
                                            @error('heading')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--Details -->
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="details"  class="fw-bolder">Details</label>
                                            <textarea name="details"  class="form-control summernote" cols="" rows="3">{!! old('details', $career->details ?? '') !!} </textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="mt-2 btn btn-primary btn-sm">Update</button>
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
