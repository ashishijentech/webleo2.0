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
                                    <form action="" method="post"
                                        id="Manufactore_add">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Manufacturer Name <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="manufacturer_name">
                                                    @error('manufacturer_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">WLP Parent Name <span
                                                            class="text-danger badge">*</span></label>
                                                    <select name="wlp_parent_name" class="form-select form-select-md">
                                                        <option selected disabled>Choose Parent Name</option>
                                                        
                                                    </select>
                                                    @error('wlp_parent_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Manufacturer Code <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="manufacturer_code">
                                                    @error('manufacturer_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Mobile No. <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="mobile_no">
                                                    @error('mobile_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">GST Number <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="gst_number">
                                                    @error('gst_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Address <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="address">
                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Email Id <span
                                                            class="text-danger badge">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="email">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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
@endsection
