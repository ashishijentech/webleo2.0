@extends('layouts.dealerapp')

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
                                    <h4 class="card-title">Onboard Technician</h4>
                                    <form action="{{ route('dealer.store.technician') }}" method="post" id="">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="row">
                                                <input type="text" class="form-control" name="dealer_id"
                                                    value="{{ Auth()->user()->id }}" hidden>
                                                <div class="col-md-6">
                                                    <label for="">Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Gender<span class="text-danger">*</span></label>
                                                    <select name="gender" id="gender" class="form-select">
                                                        <option>Select Option</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Email Id <span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label for="">Mobile Number</label>
                                                    <input type="text" class="form-control" name="mobile_no">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Aadhar</label>
                                                    <input type="text" class="form-control" name="aadhar">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">DOB</label>
                                                    <input type="date" class="form-control" name="dob">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label for="">Qulification</label> <span
                                                        class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="qulification">
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
