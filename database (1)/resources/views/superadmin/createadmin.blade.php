@extends('layouts.superadminapp')

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
                                    <h4 class="card-title">Onboard Admin</h4>
                                    <form action="{{route('superadmin.store.admin')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Name Of The Business <span
                                                    class="badge text-danger">*</span></label>
                                            <input type="text" name="name_of_the_business" class="form-control"
                                                value="{{ old('name_of_the_business') }}">
                                            @error('name_of_the_business')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Regd. Address <span
                                                    class="badge text-danger">*</span></label>
                                            <textarea name="regd_address" cols="30" rows="3" class="form-control">{{ old('regd_address') }}</textarea>
                                            @error('regd_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">GSTIN No. <span
                                                            class="badge text-danger">*</span></label>
                                                    <input type="text" name="gstin_no" class="form-control"
                                                        value="{{ old('gstin_no') }}">
                                                    @error('gstin_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Pan No. <span
                                                            class="badge text-danger">*</span></label>
                                                    <input type="text" name="pan_no" class="form-control"
                                                        value="{{ old('pan_no') }}">
                                                    @error('pan_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Name Of The Business Owner <span
                                                    class="badge text-danger">*</span></label>
                                            <input type="text" name="name_of_the_business_owner" class="form-control"
                                                value="{{ old('name_of_the_business_owner') }}">
                                            @error('name_of_the_business_owner')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Email <span
                                                            class="badge text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ old('email') }}">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Contact No. <span
                                                            class="badge text-danger">*</span></label>
                                                    <input type="number" name="contact_no" class="form-control"
                                                        value="{{ old('contact_no') }}">
                                                    @error('contact_no')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Upload GST Certificate <span
                                                            class="badge text-danger">*</span>(PDF Only)</label>
                                                    <input type="file" name="gst_certificate" class="form-control">
                                                    @error('gst_certificate')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Upload Pan Card <span
                                                            class="badge text-danger">*</span></label>
                                                    <input type="file" name="pan_card" class="form-control">
                                                    @error('pan_card')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Upload Incorporation Certificate <span
                                                            class="badge text-danger">*</span></label>
                                                    <input type="file" name="incorporation_certificate"
                                                        class="form-control">
                                                    @error('incorporation_certificate')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Company Logo <span
                                                            class="badge text-danger">*</span></label>
                                                    <input type="file" name="company_logo" id=""
                                                        class="form-control">
                                                    @error('company_logo')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">
                                            Onboard</button>
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
