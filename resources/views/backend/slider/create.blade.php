@extends('backend.layouts.master')
@section('title', 'Slider Create')
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
                                <div class="card-title">Create Slider</div>
                                <div class="py-0 ms-md-auto py-md-0">
                                    @role('super_admin')
                                    <a href="{{ route('slider.index') }}" class="btn btn-primary btn-sm">Back</a>
                                    @else
                                        @can('slider.list')
                                            <a href="{{ route('slider.index') }}" class="btn btn-primary btn-sm">Back</a>
                                        @endcan
                                        @endrole
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    <!-- Name -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Name <span style="color: red">*</span></label>
                                            <input type="text" name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="url">URL<span style="color: red">*</span></label>
                                            <input type="text" name="url"
                                                   class="form-control @error('url') is-invalid @enderror"
                                                   value="{{ old('url') }}">
                                            @error('url')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <!--Description-->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="" class="form-control" cols="" rows="6"></textarea>
                                        </div>
                                    </div>
                                    <!-- Client Image -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="image">Image(Preferred size: 400X400)</label>
                                            <input type="file" name="image"
                                                   class="form-control @error('image') is-invalid @enderror" id="image"
                                                   onchange="previewImage(event)" />
                                            @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="mt-2">
                                                <img id="imagePreview" width="50">
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Client Signature Image -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="signature_image">Signature Image(Preferred size: 100X100)</label>
                                            <input type="file" name="signature_image"
                                                   class="form-control @error('signature_image') is-invalid @enderror"
                                                   id="signature_image" onchange="previewSignatureImage(event)" />
                                            @error('signature_image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="mt-2">
                                                <img id="imageSignaturePreview" width="50">
                                            </div>

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

    <script type="text/javascript">
        function previewSignatureImage(event) {
            var reader1 = new FileReader();
            reader1.onload = function() {
                var output1 = document.getElementById('imageSignaturePreview');
                output1.src = reader1.result;
                output1.style.display = 'block';
            };
            reader1.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        $(document).ready(function() {

            $(".js-example-templating").select2({
                placeholder: "Select",
                allowClear: true
            });
            // Fetch Thanas based on District
            $('#district').change(function() {
                var districtID = $(this).val();
                if (districtID) {
                    $.ajax({
                        url: "{{ route('getThanas') }}",
                        type: "GET",
                        data: {
                            district_id: districtID
                        },
                        success: function(data) {
                            $('#thana').empty().append(
                                '<option value="">Select Police Station</option>');
                            $.each(data, function(key, value) {
                                $('#thana').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#thana').empty().append('<option value="">Select Police Station</option>');
                }
            });
        });
    </script>
@endpush
