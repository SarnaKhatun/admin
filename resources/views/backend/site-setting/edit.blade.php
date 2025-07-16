@extends('backend.layouts.master')
@section('title', 'Site setting')
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
                <h4>Site setting</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-title">Edit Site setting</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('site-settings.update', $setting ? $setting->id : '')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- site name -->
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="site_name" class="fw-bolder">Site Name <span style="color: red">*</span></label>
                                            <input type="text" name="site_name"
                                                   class="form-control @error('site_name') is-invalid @enderror"
                                                   value="{{ old('site_name', $setting->site_name ?? '') }}">
                                            @error('site_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="business_name" class="fw-bolder">Business Name <span style="color: red">*</span></label>
                                            <input type="text" name="business_name"
                                                   class="form-control @error('business_name') is-invalid @enderror"
                                                   value="{{ old('business_name', $setting->business_name ?? '') }}">
                                            @error('business_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="business_hour" class="fw-bolder">Business Hour <span style="color: red">*</span></label>
                                            <input type="number" name="business_hour"
                                                   class="form-control @error('business_hour') is-invalid @enderror"
                                                   value="{{ old('business_hour', $setting->business_hour ?? '') }}">
                                            @error('business_hour')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="phone" class="fw-bolder">Email <span style="color: red">*</span></label>
                                            <input type="email" name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email', $setting->email ?? '') }}">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="phone" class="fw-bolder">Phone <span style="color: red">*</span></label>
                                            <input type="number" name="phone"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   value="{{ old('phone', $setting->phone ?? '') }}">
                                            @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="facebook_link" class="fw-bolder">Facebook Link <span style="color: red">*</span></label>
                                            <input type="url" name="facebook_link"
                                                   class="form-control @error('facebook_link') is-invalid @enderror"
                                                   value="{{ old('facebook_link', $setting->facebook_link ?? '') }}">
                                            @error('facebook_link')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="twitter_link" class="fw-bolder">Twitter Link <span style="color: red">*</span></label>
                                            <input type="url" name="twitter_link"
                                                   class="form-control @error('twitter_link') is-invalid @enderror"
                                                   value="{{ old('twitter_link', $setting->twitter_link ?? '') }}">
                                            @error('twitter_link')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="twitter_link" class="fw-bolder">Twitter Link <span style="color: red">*</span></label>
                                            <input type="url" name="twitter_link"
                                                   class="form-control @error('twitter_link') is-invalid @enderror"
                                                   value="{{ old('twitter_link', $setting->twitter_link ?? '') }}">
                                            @error('twitter_link')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="linkedin_link" class="fw-bolder">Linkedin Link <span style="color: red">*</span></label>
                                            <input type="url" name="linkedin_link"
                                                   class="form-control @error('linkedin_link') is-invalid @enderror"
                                                   value="{{ old('linkedin_link', $setting->linkedin_link ?? '') }}">
                                            @error('linkedin_link')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="youtube_link" class="fw-bolder">Youtube Link <span style="color: red">*</span></label>
                                            <input type="url" name="youtube_link"
                                                   class="form-control @error('youtube_link') is-invalid @enderror"
                                                   value="{{ old('youtube_link', $setting->youtube_link ?? '') }}">
                                            @error('youtube_link')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="instagram_link" class="fw-bolder">Instagram Link <span style="color: red">*</span></label>
                                            <input type="url" name="instagram_link"
                                                   class="form-control @error('instagram_link') is-invalid @enderror"
                                                   value="{{ old('instagram_link', $setting->instagram_link ?? '') }}">
                                            @error('instagram_link')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="pinterest_link" class="fw-bolder">Pinterest Link <span style="color: red">*</span></label>
                                            <input type="url" name="pinterest_link"
                                                   class="form-control @error('pinterest_link') is-invalid @enderror"
                                                   value="{{ old('pinterest_link', $setting->pinterest_link ?? '') }}">
                                            @error('pinterest_link')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="google_map"  class="fw-bolder">Google Map</label>
                                            <textarea name="google_map"  class="form-control" cols="" rows="3">{!! old('google_map', $setting->google_map ?? '') !!} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="address"  class="fw-bolder">Address</label>
                                            <textarea name="address"  class="form-control" cols="" rows="3">{!! old('address', $setting->address ?? '') !!} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="description"  class="fw-bolder">Description</label>
                                            <textarea name="description"  class="form-control summernote" cols="" rows="3">{!! old('description', $setting->description ?? '') !!} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="message"  class="fw-bolder">Message</label>
                                            <textarea name="message"  class="form-control" cols="" rows="3">{!! old('address', $setting->message ?? '') !!} </textarea>
                                        </div>
                                    </div>
                                    <!-- site_favicon -->
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="site_favicon" class="fw-bolder">Site Favicon</label>
                                            <input type="file" name="site_favicon"
                                                   class="@error('site_favicon') is-invalid @enderror" id="site_favicon"
                                                   onchange="previewIconImage(event)" />
                                            <div class="mt-2">

                                                @if (!empty($setting->site_favicon))
                                                    <img id="imageIconPreview"
                                                         src="{{ asset('storage/' . $setting->site_favicon) }}"
                                                         alt="Site Favicon" width="75">
                                                @else
                                                    <img id="imageIconPreview"
                                                         src="{{ asset('default.png') }}"
                                                         alt="No Image" width="75">
                                                @endif
                                            </div>
                                            @error('site_favicon')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="site_header_logo" class="fw-bolder">Site Header Logo</label>
                                            <input type="file" name="site_header_logo"
                                                   class="@error('site_header_logo') is-invalid @enderror" id="site_header_logo"
                                                   onchange="previewHeaderImage(event)" />
                                            <div class="mt-2">

                                                @if (!empty($setting->site_header_logo))
                                                    <img id="imageHeaderPreview"
                                                         src="{{ asset('storage/' . $setting->site_header_logo) }}"
                                                         alt="Site Header Logo" width="75">
                                                @else
                                                    <img id="imageHeaderPreview"
                                                         src="{{ asset('default.png') }}"
                                                         alt="No Image" width="75">
                                                @endif
                                            </div>
                                            @error('site_header_logo')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6 mt-2">
                                        <div class="form-group">
                                            <label for="site_footer_logo" class="fw-bolder">Site Footer Logo</label>
                                            <input type="file" name="site_footer_logo"
                                                   class="@error('site_footer_logo') is-invalid @enderror" id="site_footer_logo"
                                                   onchange="previewFooterImage(event)" />
                                            <div class="mt-2">

                                                @if (!empty($setting->site_footer_logo))
                                                    <img id="imageFooterPreview"
                                                         src="{{ asset('storage/' . $setting->site_footer_logo) }}"
                                                         alt="Site footer logo" width="75">
                                                @else
                                                    <img id="imageFooterPreview"
                                                         src="{{ asset('default.png') }}"
                                                         alt="No Image" width="75">
                                                @endif
                                            </div>
                                            @error('site_footer_logo')<div class="text-danger">{{ $message }}</div>@enderror
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
        function previewIconImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imageIconPreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function previewHeaderImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imageHeaderPreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function previewFooterImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imageFooterPreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
