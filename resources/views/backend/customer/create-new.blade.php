@extends('backend.layouts.master')

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
                                <div class="card-title">Add Client</div>
                                <div class="py-0 ms-md-auto py-md-0">
                                    @role('super_admin')
                                        <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm">Back</a>
                                    @else
                                        @can('client.list')
                                            <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm">Back</a>
                                        @endcan
                                    @endrole
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    <!-- Name -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Name(Bangla) <span style="color: red">*</span></label>
                                            <input type="text" name="name_bn"
                                                class="form-control @error('name_bn') is-invalid @enderror"
                                                value="{{ old('name_bn') }}">
                                            @error('name_bn')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Name(English) <span style="color: red">*</span></label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Father's Name -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="father-name-bn">Father's Name(Bangla) <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="father_name_bn"
                                                class="form-control @error('father_name_bn') is-invalid @enderror"
                                                value="{{ old('father_name_bn') }}">
                                            @error('father_name_bn')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="father-name-en">Father's Name(English) <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="father_name_en"
                                                class="form-control @error('father_name_en') is-invalid @enderror"
                                                value="{{ old('father_name_en') }}">
                                            @error('father_name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Mother's Name -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="mother-name-bn">Mother's Name(Bangla) <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="mother_name_bn"
                                                class="form-control @error('mother_name_bn') is-invalid @enderror"
                                                value="{{ old('mother_name_bn') }}">
                                            @error('mother_name_bn')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="mother-name-en">Mother's Name(English) <span
                                                    style="color: red">*</span></label>
                                            <input type="text" name="mother_name_en"
                                                class="form-control @error('mother_name_en') is-invalid @enderror"
                                                value="{{ old('mother_name_en') }}">
                                            @error('mother_name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Husband or Wife Name -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="husband_or_wife_name-bn">Husband or Wife Name(Bangla)</label>
                                            <input type="text" name="husband_or_wife_name_bn" class="form-control"
                                                value="{{ old('husband_or_wife_name_bn') }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="husband_or_wife_name-en">Husband or Wife Name(English)</label>
                                            <input type="text" name="husband_or_wife_name_en" class="form-control"
                                                value="{{ old('husband_or_wife_name_en') }}">
                                        </div>
                                    </div>

                                    <!--Present Address -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="present-address">Present Address(Bangla)</label>
                                            <textarea name="present_address_bn" id="" class="form-control" cols="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="present-address-en">Present Address(English)</label>
                                            <textarea name="present_address_en" id="" class="form-control" cols="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <!--Permanent Address -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="permanent-address">Permanent Address(Bangla)</label>
                                            <textarea name="permanent_address_bn" id="" class="form-control" cols="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="permanent-address-en">Permanent Address(English)</label>
                                            <textarea name="permanent_address_en" id="" class="form-control" cols="" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <!-- District Dropdown -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="district">District</label>
                                            <select name="district_id" id="district"
                                                class="form-control js-example-templating">
                                                <option value="">Select District</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->bn_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Thana Dropdown -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="thana">Police Station</label>
                                            <select name="thana_id" id="thana"
                                                class="form-control js-example-templating">
                                                <option value="">Select Police Station</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Village -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="village-name">Village(Bangla)</label>
                                            <input type="text" name="village_bn" class="form-control"
                                                value="{{ old('village_bn') }}">
                                        </div>
                                    </div>

                                    <!-- Post Office -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="post-office">Post Office(Bangla)</label>
                                            <input type="text" name="post_office_bn" class="form-control"
                                                value="{{ old('post_office_bn') }}">
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>

                                    <!--Mobile Number-->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="mobile">Mobile Number <span style="color: red">*</span></label>
                                            <input type="number" name="mobile_number"
                                                class="form-control @error('mobile_number') is-invalid @enderror"
                                                value="{{ old('mobile_number') }}">
                                            @error('mobile_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Email -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <!-- NID Number -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="nid">NID Number</label>
                                            <input type="number" name="nid_number" class="form-control"
                                                value="{{ old('nid_number') }}">
                                        </div>
                                    </div>

                                    <!-- Passport Number -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="passport">Passport Number</label>
                                            <input type="text" name="passport_number" class="form-control"
                                                value="{{ old('passport_number') }}">
                                        </div>
                                    </div>
                                    <!-- TIN Number -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="tin">TIN Number</label>
                                            <input type="text" name="tin_number" class="form-control"
                                                value="{{ old('tin_number') }}">
                                        </div>
                                    </div>

                                    <!-- dob -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control"
                                                value="{{ old('dob', date('Y-m-d')) }}">
                                        </div>
                                    </div>

                                    <!-- Blood Group -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="email">Blood Group</label>
                                            <select name="blood_group" class="form-control">
                                                <option value="">select one</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Occupation -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="occupation">Occupation</label>
                                            <input type="text" name="occupation" value="{{ old('occupation') }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <!-- date -->
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="date">Client Opening Date</label>
                                            <input type="date" name="date" class="form-control"
                                                value="{{ old('date', date('Y-m-d')) }}">
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
