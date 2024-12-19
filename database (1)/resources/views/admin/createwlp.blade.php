@extends('layouts.adminapp')

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
                                    <h4 class="card-title">Onboard WLP</h4>
                                    <form action="{{route('admin.store.wlp')}}" method="post" id="wlp_rgd_form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Select Country <span
                                                        class="badge text-danger">*</span></label>
                                                <select name="country" class="form-control country">
                                                    <option disabled @selected(true)>Choose Country</option>
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
                                                <label for="">Default Language <span
                                                        class="badge text-danger">*</span></label>
                                                <select name="language" class="form-control">
                                                    <option value="english" @selected(old('language') == 'english')>English</option>
                                                    <option value="hindi" @selected(old('language') == 'hindi')>Hindi</option>
                                                    <option value="oriya" @selected(old('language') == 'oriya')>Oriya</option>
                                                </select>
                                                @error('language')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row my-3">
                                            <div class="col-md-8">
                                                <label for="">Name <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control form-control-sm"
                                                    value="{{ old('first_name') }}">
                                                @error('first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <label for="">Mobile No. <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="mobile_no" class="form-control form-control-sm"
                                                    value="{{ old('mobile_no') }}">
                                                @error('mobile_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <label for="">Parent Name <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="parent_name" class="form-control form-control-sm"
                                                    value="{{ old('parent_name') }}">
                                                @error('parent_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Parent Code <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="parent_code" class="form-control form-control-sm"
                                                    value="{{ old('parent_code') }}">
                                                @error('parent_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Website <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="website" class="form-control form-control-sm"
                                                    value="{{ old('website') }}">
                                                @error('website')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <label for="">Web URL <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="web_url" class="form-control form-control-sm"
                                                    value="{{ old('web_url') }}">
                                                @error('web_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Logo <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="file" name="logo" class="form-control form-control-sm"
                                                    value="">
                                                @error('logo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Address <span
                                                        class="badge text-danger">*</span></label>
                                                <textarea name="address" id="" cols="30" rows="3" class="form-control">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <label for="">Sales Mobile No. (+91) <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="sales_mobile_no" class="form-control form-control-sm"
                                                    value="{{ old('sales_mobile_no') }}">
                                                @error('sales_mobile_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Sales LandLine No. <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="landline_no" class="form-control form-control-sm"
                                                    value="{{ old('landline_no') }}">
                                                @error('landline_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Sales Email ID <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="email_id" class="form-control form-control-sm"
                                                    value="{{ old('email_id') }}">
                                                @error('email_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <label for="">Smart Parent App Package <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="smart_parent_app_package"
                                                    class="form-control form-control-sm" value="{{ old('smart_parent_app_package') }}">
                                                @error('smart_parent_app_package')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Show Powered By <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="show_powered_by" class="form-control form-control-sm"
                                                    value="{{ old('show_powered_by') }}">
                                                @error('show_powered_by')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Powered By <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="power_by" class="form-control form-control-sm"
                                                    value="{{ old('power_by') }}">
                                                @error('power_by')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <label for="">Account limit <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="account_limit" class="form-control form-control-sm"
                                                    value="{{ old('account_limit') }}">
                                                @error('account_limit')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Http Sms Gateway URL <span
                                                        class="badge text-danger">*</span></label> 
                                                <input type="text" name="http_sms_url" class="form-control form-control-sm"
                                                    value="{{ old('http_sms_url') }}">
                                                @error('http_sms_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">http Sms Gateway Method <span
                                                        class="badge text-danger">*</span></label>
                                                <input name="http_sms__gateway_method" class="form-control form-control-sm"
                                                    value="{{ old('http_sms__gateway_method') }}">
                                                @error('http_sms__gateway_method')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <label for="">GSTN No. <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="gstn_no" class="form-control form-control-sm"
                                                    value="{{ old('gstn_no') }}">
                                                @error('gstn_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Billing Email <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="email" name="billing_email" class="form-control form-control-sm"
                                                    value="{{ old('billing_email') }}">
                                                @error('billing_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">IsAllowThirdPartyAPI <span
                                                        class="badge text-danger">*</span></label>
                                                <input type="text" name="isallowthirdpartyapi" class="form-control form-control-sm"
                                                    value="{{ old('isallowthirdpartyapi') }}">
                                                @error('isallowthirdpartyapi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
