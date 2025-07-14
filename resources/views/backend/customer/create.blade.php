@extends('backend.layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4>Client</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt- pb-0">
                                <div class="card-title">Add Client</div>
                                <div class="ms-md-auto py-0 py-md-0">
                                    @role('super_admin')
                                    <a href="{{ route('clients.index') }}" class="btn btn-primary btn-round">Back</a>
                                    @else
                                        @can('client.list')
                                            <a href="{{ route('clients.index') }}" class="btn btn-primary btn-round">Back</a>
                                        @endcan
                                        @endrole
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name(Bangla)</label>
                                            <input type="text" name="name_bn" class="form-control @error('name_bn') is-invalid @enderror" value="{{ old('name_bn') }}" >
                                            @error('name_bn')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name(English)</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Father's Name -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="father-name-bn">Father's Name(Bangla)</label>
                                            <input type="text" name="father_name_bn" class="form-control" value="{{ old('father_name_bn') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="father-name-en">Father's Name(English)</label>
                                            <input type="text" name="father_name_en" class="form-control" value="{{ old('father_name_en') }}" >
                                        </div>
                                    </div>

                                    <!-- Mother's Name -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mother-name-bn">Mother's Name(Bangla)</label>
                                            <input type="text" name="mother_name_bn" class="form-control" value="{{ old('mother_name_bn') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mother-name-en">Mother's Name(English)</label>
                                            <input type="text" name="mother_name_en" class="form-control" value="{{ old('mother_name_en') }}" >
                                        </div>
                                    </div>

                                    <!-- Husband or Wife Name -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="husband_or_wife_name-bn">Husband or Wife Name(Bangla)</label>
                                            <input type="text" name="husband_or_wife_name_bn" class="form-control" value="{{ old('husband_or_wife_name_bn') }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="husband_or_wife_name-en">Husband or Wife Name(English)</label>
                                            <input type="text" name="husband_or_wife_name_en" class="form-control" value="{{ old('husband_or_wife_name_en') }}" >
                                        </div>
                                    </div>

                                    <!--Present Address -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="present-address">Present Address(Bangla)</label>
                                            <textarea name="present_address_bn" id="" class="form-control" cols="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="present-address-en">Present Address(English)</label>
                                            <textarea name="present_address_en" id="" class="form-control" cols="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <!--Permanent Address -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="permanent-address">Permanent Address(Bangla)</label>
                                            <textarea name="permanent_address_bn" id="" class="form-control" cols="" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="permanent-address-en">Permanent Address(English)</label>
                                            <textarea name="permanent_address_en" id="" class="form-control" cols="" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <!-- District Dropdown -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="district">District</label>
                                            <select name="district_id" id="district" class="form-control" >
                                                <option value="">Select District</option>
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->bn_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Upazila Dropdown -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="upazila">Upazila</label>
                                            <select name="upazila_id" id="upazila" class="form-control" >
                                                <option value="">Select Upazila</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Village -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="village-name">Village(Bangla)</label>
                                            <input type="text" name="village_bn" class="form-control" value="{{ old('village_bn') }}" >
                                        </div>
                                    </div>

                                    <!-- Post Office -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="post-office">Post Office(Bangla)</label>
                                            <input type="text" name="post_office_bn" class="form-control" value="{{ old('post_office_bn') }}" >
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="number" name="phone" class="form-control" value="{{ old('phone') }}" >
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" >
                                        </div>
                                    </div>

                                    <!-- NID Number -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nid">NID Number</label>
                                            <input type="number" name="nid_number" class="form-control" value="{{ old('nid_number') }}" >
                                        </div>
                                    </div>

                                    <!-- Passport Number -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport">Passport Number</label>
                                            <input type="text" name="passport_number" class="form-control" value="{{ old('passport_number') }}" >
                                        </div>
                                    </div>


                                    <!-- TIN Number -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tin">TIN Number</label>
                                            <input type="text" name="tin_number" class="form-control" value="{{ old('tin_number') }}" >
                                        </div>
                                    </div>

                                    <!-- dob -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" value="{{ old('dob', date('Y-m-d')) }}" >
                                        </div>
                                    </div>

                                    <!-- Blood Group -->
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="occupation">Occupation</label>
                                            <select name="occupation" id="occupation" class="form-control" >
                                                <option value="">Select Occupation</option>
                                                <option value="Student">Student</option>
                                                <option value="Teacher">Teacher</option>
                                                <option value="Engineer">Engineer</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Businessman">Businessman</option>
                                                <option value="Farmer">Farmer</option>
                                                <option value="Housewife">Housewife</option>
                                                <option value="Lawyer">Lawyer</option>
                                                <option value="Lawyer">Worker</option>
                                                <option value="Driver">Driver</option>
                                                <option value="Police">Police</option>
                                                <option value="Retired">Retired</option>
                                                <option value="Freelancer">Freelancer</option>
                                                <option value="Unemployed">Unemployed</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- date -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}" >
                                        </div>
                                    </div>


{{--                                    <!-- Deposit Amount -->--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="deposit-amount">Deposit Amount</label>--}}
{{--                                            <input type="number" name="deposit_amount" class="form-control" value="{{ old('deposit_amount') }}" >--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <!-- Client Image -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image"
                                                   class="form-control-file @error('image') is-invalid @enderror"
                                                   id="image" onchange="previewImage(event)"/>
                                            @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <div class="mt-2">
                                                <img id="imagePreview" width="50">
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
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
            reader.onload = function () {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script>
        $(document).ready(function() {
            // Fetch Upazilas based on District
            $('#district').change(function() {
                var districtID = $(this).val();
                if (districtID) {
                    $.ajax({
                        url: "{{ route('getUpazilas') }}",
                        type: "GET",
                        data: { district_id: districtID },
                        success: function(data) {
                            $('#upazila').empty().append('<option value="">Select Upazila</option>');
                            $.each(data, function(key, value) {
                                $('#upazila').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                } else {
                    $('#upazila').empty().append('<option value="">Select Upazila</option>');
                }
            });
        });
    </script>
@endpush
