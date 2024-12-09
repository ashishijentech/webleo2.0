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
                                        <form action="{{route('superadmin.admin.update',$details->id)}}" method="post" enctype="multipart/form-data">
                                             @csrf
                                             @method('PUT')
                                             <div class="mb-3">
                                                  <label for="">Name Of The Business <span
                                                            class="badge text-danger">*</span></label>
                                                  <input type="text" name="name_of_the_business" class="form-control"
                                                       value="{{ $details->business_name }}">
                                             </div>

                                             @csrf
                                             <div class="mb-3">
                                                  <label for="">Regd. Address <span
                                                            class="badge text-danger">*</span></label>
                                                  <textarea name="regd_address" cols="30" rows="3"
                                                       class="form-control">{{ $details->regd_address  }}</textarea>
                                             </div>

                                             <div class="mb-3">
                                                  <div class="row">
                                                       <div class="col-md-6">
                                                            <label for="">GSTIN No. <span
                                                                      class="badge text-danger">*</span></label>
                                                            <input type="text" name="gstin_no" class="form-control"
                                                                 value="{{ $details->gstin_no }}">
                                                       </div>
                                                       <div class="col-md-6">
                                                            <label for="">Pan No. <span
                                                                      class="badge text-danger">*</span></label>
                                                            <input type="text" name="pan_no" class="form-control"
                                                                 value="{{ $details->pan_no }}">
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="mb-3">
                                                  <label for="">Name Of The Business Owner <span
                                                            class="badge text-danger">*</span></label>
                                                  <input type="text" name="name_of_the_business_owner"
                                                       class="form-control"
                                                       value="{{ $details->name_of_the_business_owner }}">

                                             </div>
                                             <div class="mb-3">
                                                  <div class="row">
                                                       <div class="col-md-6">
                                                            <label for="">Email <span
                                                                      class="badge text-danger">*</span></label>
                                                            <input type="email" name="email" class="form-control"
                                                                 value="{{ $details->usr->email }}">

                                                       </div>
                                                       <div class="col-md-6">
                                                            <label for="">Contact No. <span
                                                                      class="badge text-danger">*</span></label>
                                                            <input type="number" name="contact_no" class="form-control"
                                                                 value="{{ $details->contact_no }}">

                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="mb-3">
                                                  <div class="row">
                                                       <div class="col-md-6">
                                                            <label for=""> GST Certificate <span
                                                                      class="badge text-danger">*</span>(PDF
                                                                 Only)</label>
                                                            <input type="file" name="gst_certificate"
                                                                 class="form-control">
                                                            @if($details->gst_certificate)
                                                                                <img src="{{ asset('storage/' . $details->gst_certificate) }}"
                                                                                      alt="Logo" width="100">
                                                                           @endif
                                                       </div>
                                                       <div class="col-md-6">
                                                            <label for="">Upload Pan Card <span
                                                                      class="badge text-danger">*</span></label>
                                                            <input type="file" name="pan_card" class="form-control">
                                                            @if($details->pan_card)
                                                                                <img src="{{ asset('storage/' . $details->pan_card) }}"
                                                                                      alt="Logo" width="100">
                                                                           @endif
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
                                                            @if($details->incorporation_certificate)
                                                                                <img src="{{ asset('storage/' . $details->incorporation_certificate) }}"
                                                                                      alt="Logo" width="100">
                                                                           @endif
                                                       </div>
                                                       <div class="col-md-6">
                                                            <label for="">Company Logo <span
                                                                      class="badge text-danger">*</span></label>
                                                            <input type="file" name="company_logo" id=""
                                                                 class="form-control">
                                                            @if($details->logo)
                                                                                <img src="{{ asset('storage/' . $details->logo) }}"
                                                                                      alt="Logo" width="100">
                                                                           @endif
                                                       </div>
                                                  </div>
                                             </div>
                                             <button type="submit" class="btn btn-success">Update</button>
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