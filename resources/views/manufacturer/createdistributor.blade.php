@extends('layouts.manufacturerapp')

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
                                    <h4 class="card-title">Onboard Disributor</h4>
                                    <form action="{{route('manufacturer.store.distributors')}}" method="post" id="edit_Distributer">
                                        @csrf
                                        <div class="card">
                                            <div class="my-3 mx-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="">Business Name<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="business_name" value="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="name" value="">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Email<span
                                                                class="text-danger">*</span></label>
                                                        <input type="email" class="form-control form-control-sm"
                                                            name="email" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 mx-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="">Gender<span
                                                                class="text-danger">*</span></label>
                                                        <select name="gender" id=""
                                                            class="form-select form-select-sm">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Mobile<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="mobile" value="">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Date Of Birth<span
                                                                class="text-danger">*</span></label>
                                                        <input type="date" class="form-control form-control-sm"
                                                            name="date_of_birth">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Age<span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="age" value="" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 mx-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Is Map Device Edit <span
                                                                class="text-danger">*</span></label><br>
                                                        <div class="form-check form-check-inline">

                                                            <input type="radio" id="yes" name="map_device_edit"
                                                                value="yes" class="form-check-input">
                                                            <label for="yes">Yes</label>

                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="no" name="map_device_edit"
                                                                value="no" class="form-check-input" checked>
                                                            <label for="no">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Pan Number<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="pan_number" value="">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Occupation<span
                                                                class="text-danger">*</span></label>
                                                        <select name="occupation" id=""
                                                            class="form-select form-select-sm">
                                                            <option value="" hidden>Select Occupation</option>
                                                            <option value="Business Man">Business Man</option>
                                                            <option value="Student">Student</option>
                                                            <option value="House Wife">House Wife</option>
                                                            <option value="VRS Employees">VRS Employees
                                                            </option>
                                                            <option value="Retired Employees">Retired
                                                                Employees</option>
                                                            <option value="Self Employed">Self Employed
                                                            </option>
                                                            <option value="Private Employees">Private
                                                                Employees</option>
                                                            <option value="Marketing Executives">Marketing
                                                                Executives</option>
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-md-3">
                                                        <label for="">Payment Type<span
                                                                class="text-danger">*</span></label>
                                                        <select name="paymentType" id=""
                                                            class="form-select form-select-sm state">
                                                            <option value="" hidden>Select Occupation</option>
                                                            <option value="Advasnce">Advasnce</option>
                                                            <option value="After Delivered">After Delivered
                                                            </option>
                                                        </select>
                                                    </div> --}}
                                                    <div class="col-md-3">
                                                        <label for="">Advance Payment<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="advance_payment" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 mx-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Languages Known<span
                                                                class="text-danger">*</span></label><br>
                                                        <select data-placeholder="Select Categories" multiple
                                                            class="form-control chosen-select " name="language_known"
                                                            tabindex="8">
                                                            <option></option>
                                                            <option value="english">English</option>
                                                            <option value="hindi">Hindi</option>
                                                            <option value="odiya">Odiya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card my-3 py-3">
                                            <div class="mb-3 mx-3">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="">Country<span
                                                                class="text-danger">*</span></label>
                                                        <select name="country"
                                                            class="form-control form-control-sm country">
                                                            <option disabled @selected(true)>Choose Country
                                                            </option>
                                                            <option value="china" @selected(old('country') == 'china')>China
                                                            </option>
                                                            <option value="india" @selected(old('country') == 'india')>India
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">State<span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-control form-control-sm state" name="state"
                                                            id=""></select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">RTO Division<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="rto_devision">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 mx-3">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="">District<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="district" value="">
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="">Pin Code<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control form-control-sm"
                                                            name="pincode" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">Area<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="area" >

                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="">Address<span
                                                                class="text-danger">*</span></label>
                                                        <textarea type="text" class="form-control Alphanumeric AddressValidation" name="address" value=''> </textarea>
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
        </div>
    </div>
@endsection
