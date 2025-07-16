@extends('backend.layouts.master')
@section('title', 'Mission Vision')
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
                <h4>Mission Vision</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-title">Edit About us</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('mission-vision.update', $mission_vision ? $mission_vision->id : '')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Image -->
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="image" class="fw-bolder">Image</label>
                                            <input type="file" name="image"
                                                   class="@error('image') is-invalid @enderror" id="image"
                                                   onchange="previewImage(event)" />
                                            <div class="mt-2">

                                                @if (!empty($mission_vision->image))
                                                    <img id="imagePreview"
                                                         src="{{ asset('storage/' . $mission_vision->image) }}"
                                                         alt="Mission Vision Image" width="75">
                                                @else
                                                    <img id="imagePreview"
                                                         src="{{ asset('default.png') }}"
                                                         alt="No Image" width="75">
                                                @endif
                                            </div>
                                            @error('image')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-12  mt-2">
                                        <div class="form-group">
                                            <label for="multi_img" class="fw-bolder">Multiple Image</label>
                                            <input type="file" name="multi_img[]" multiple
                                                   class="@error('multi_img') is-invalid @enderror" id="multi_img"
                                                   onchange="previewMissionImages(event)" />

                                            <div class="mt-2 d-flex gap-2 flex-wrap" id="imageMissionPreviewContainer">
                                                @if (!empty($mission_vision->multi_img))
                                                    @foreach (json_decode($mission_vision->multi_img, true) as $img)
                                                        <img src="{{ asset('storage/' . $img) }}" alt="Mission Image" width="75">
                                                    @endforeach
                                                @else
                                                    <img src="{{ asset('default.png') }}" alt="No Image" width="75">
                                                @endif
                                            </div>

                                            @error('multi_img')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- title one-->
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="title_one" class="fw-bolder">Title One<span style="color: red">*</span></label>
                                            <input type="text" name="title_one"
                                                   class="form-control @error('title_one') is-invalid @enderror"
                                                   value="{{ old('title_one', $mission_vision->title_one ?? '') }}">
                                            @error('title_one')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- title two -->
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="title_two" class="fw-bolder">Title Two<span style="color: red">*</span></label>
                                            <input type="text" name="title_two"
                                                   class="form-control @error('title_two') is-invalid @enderror"
                                                   value="{{ old('title_two', $mission_vision->title_two ?? '') }}">
                                            @error('title_two')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="heading" class="fw-bolder">Heading <span style="color: red">*</span></label>
                                            <input type="text" name="heading"
                                                   class="form-control @error('heading') is-invalid @enderror"
                                                   value="{{ old('heading', $mission_vision->heading ?? '') }}">
                                            @error('heading')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--Short Description -->
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="short_description"  class="fw-bolder">Short Description</label>
                                            <textarea name="short_description"  class="form-control summernote" cols="" rows="3">{!! old('short_description', $mission_vision->short_description ?? '') !!} </textarea>
                                        </div>
                                    </div>

                                    <!--Long Description -->
                                    <div class="col-12 col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="long_description"  class="fw-bolder">Long Description</label>
                                            <textarea name="long_description"  class="form-control summernote" cols="" rows="5">{!! old('long_description', $mission_vision->long_description ?? '') !!} </textarea>
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

    <script>
        function previewMissionImages(event) {
            const container = document.getElementById('imageMissionPreviewContainer');
            container.innerHTML = ''; // Clear previous previews

            const files = event.target.files;
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.width = 75;
                    img.classList.add('me-2', 'mb-2'); // Optional styling
                    container.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
@endpush
