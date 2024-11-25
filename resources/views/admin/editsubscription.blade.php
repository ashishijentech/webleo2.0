@extends('layouts.adminapp')

@section('content')
<div class="container-fluid page-body-wrapper">
     <div class="main-panel">
          <div class="content-wrapper">
               <div class="container">
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                         <strong> {{ session()->get('success') }}</strong>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row">
                         <div class="col-md-6 grid-margin stretch-card mx-auto">
                              <div class="card">
                                   <div class="card-body">
                                        <h4 class="card-title">Edit Subscription</h4>
                                        
                                        <form method="post" action="{{route('admin.update.subscription', $subscriptiondetails->id)}}">
                                             @csrf
                                             @method("PUT")
                                             <div class="my-3 mx-3">
                                                  <hr>
                                                  <div class="row">
                                                       <div class="col-md-6">
                                                            <label for="" class="form-label">Select Parent</label>
                                                            <Select class="form-control" name="Parentid" id="Parentid">
                                                                 <option value="{{ $subscriptiondetails->parentId }}">{{ $subscriptiondetails->id }}</option>
                                                            </Select>

                                                            @php
                                                                 echo($subscriptiondetails)
                                                            @endphp
                                                            
                                                       </div>
                                                       <div class="col-md-6">
                                                            <label for="" class="form-label">Package Type</label>
                                                            <Select class="form-control" name="PackageType" id="PackageType">
                                                            <option value="{{ $subscriptiondetails->packageType }}">{{ $subscriptiondetails->packageType }}</option>
                                                                 <option value="" hidden>Select Package Type</option>
                                                                 <option value="TRACKER">TRACKER</option>
                                                                 <option value="OFFERED">OFFERED</option>
                                                            </Select>
                                                       </div>
                                                  </div>

                                                  <div class="row my-3">
                                                       <div class="col-md-6">
                                                            <label for="" class="form-label">Package Name</label>
                                                            <input type="text" class="form-control" value="{{ $subscriptiondetails->packageName }}" name="PackageName" id="PackageName">
                                                       </div>
                                                       <div class="col-md-6">
                                                            <label for="" class="form-label">Billing Cycle</label>
                                                            <Select class="form-control" name="BillingCycle" id="BillingCycle">
                                                            <option value="{{ $subscriptiondetails->billingCycle }}">{{ $subscriptiondetails->billingCycle }}</option>
                                                                 <option value="" hidden>Select Billing Cycle</option>
                                                                 <option value="3 days">3 days</option>
                                                                 <option value="7 days">7 days</option>
                                                                 <option value="30 days">30 days</option>
                                                                 <option value="60 days">60 days</option>
                                                                 <option value="90 days">90 days</option>
                                                                 <option value="120 days">120 days</option>
                                                                 <option value="150 days">150 days</option>
                                                                 <option value="180 days">180 days</option>
                                                                 <option value="210 days">210 days</option>
                                                                 <option value="240 days">240 days</option>
                                                                 <option value="270 days">270 days</option>
                                                                 <option value="300 days">300 days</option>
                                                                 <option value="330 days">330 days</option>
                                                                 <option value="365 days">365 days</option>
                                                                 <option value="730 days">730 days</option>
                                                            </Select>
                                                       </div>
                                                  </div>
                                                  <div class="row my-3">
                                                       <div class="col-md-6">
                                                            <label for="" class="form-label">Description</label>
                                                            <input type="text" class="form-control"  value="{{ $subscriptiondetails->description }}" name="Description" id="Description">
                                                       </div>
                                                       <div class="col-md-6">
                                                            <label for="" class="form-label">Price</label>
                                                            <input type="text" class="form-control"  value="{{ $subscriptiondetails->price }}" name="Price" id="Price">
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-md-6">
                                                            <label class="form-check-label me-2" for="renewalSwitch">Is Renewal</label>
                                                            <div style="margin-top: 0"
                                                                 class="form-check form-switch d-flex align-items-center">
                                                                 <label style="margin-left: 0" class="form-check-label me-2">No</label>
                                                                 <input style="margin-left: 0" class="form-check-input" type="checkbox"
                                                                      name="Renewalcheckbox" id="renewalSwitch" {{ $subscriptiondetails->isRenewal ? 'checked' : '' }}>
                                                                 <label class="form-check-label ms-2">Yes</label>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                        
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
</div>
@endsection