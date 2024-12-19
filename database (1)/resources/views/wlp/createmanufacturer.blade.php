@extends('layouts.wlpapp')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Onboard Manufacturer</h4>
                                    <form action="{{route('wlp.store.manufacturer')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Select Country <span
                                                            class="badge text-danger">*</span></label>
                                                    <select name="country" class="form-control country">
                                                        <option disabled @selected(true)>Choose Country
                                                        </option>
                                                        <option value="china" @selected(old('country') == 'china')>China</option>
                                                        <option value="india" @selected(old('country') == 'india')>India</option>
                                                    </select>
                                                    @error('country')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="">Select State <span
                                                            class="badge text-danger">*</span></label>
                                                    <select name="state" id="" class="form-control state">
                                                        <option disabled @selected(true)>Choose State</option>
                                                    </select>
                                                    @error('state')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Manufacturer Code <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="manufacturer_code" value="{{ old('manufacturer_code') }}" >
                                                    @error('manufacturer_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Business Name</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="business_name"  value="{{ old('business_name') }}" >
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">GST Number <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="gst_number"  value="{{ old('gst_number') }}">
                                                    @error('gst_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Parent Name (WLP)<span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="hidden" class="form-control form-control-sm"
                                                        name="parent_name" value="{{ auth()->user()->id }}">
                                                    <input type="text" value="{{auth()->user()->name}}" class="form-control form-control-sm" readonly>
                                                    @error('parent_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Manufacturer Name <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="manufacturer_name"  value="{{ old('manufacturer_name') }}">
                                                    @error('manufacturer_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Mobile No. <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="mobile_no"  value="{{ old('mobile_no') }}">
                                                    @error('mobile_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Email Id <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="email"  value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Address <span
                                                            class="text-danger badge">*</span></label>
                                                    <textarea name="address" id="" cols="30" rows="10" class="form-control form-control-sm"  value="{{ old('address') }}">

                                                    </textarea>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Upload Logo</label>
                                                            <input type="file" name="logo"
                                                                class="form-control form-control-sm" id="imageInput" value="{{ old('logo') }}" >
                                                        </div>
                                                        <div class="col-md-6 p-2 text-center" style="border: 1px dashed;">
                                                            <img src="{{url('images\2265750.webp')}}" alt="" class="img-fluid" id="imagePreview"
                                                                >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary">Onboard</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#imageInput').change(function() {
            var file = $(this)[0].files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        });
    </script>
@endsection
