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
                         <div class="col-md-12 grid-margin stretch-card">
                              <div class="card">
                                   <div class="card-body">
                                        <h4 class="card-title">Onboard WLP</h4>
                                        <table class="table table-bordered">
                                             <thead class="text-white" style="background-color: #464DEE">
                                                  <tr>
                                                       <th scope="col">#</th>
                                                       <th scope="col">Parent name</th>
                                                       <th scope="col">Package Type</th>
                                                       <th scope="col">Package Name</th>
                                                       <th scope="col">Billing Cycle</th>
                                                       <th scope="col">Description</th>
                                                       <th scope="col">Price</th>
                                                       <th scope="col">isRenewal</th>
                                                       <th scope="col">Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  @foreach ($subscribtions as $subscribtion)
                                                  <tr>
                                                       <td>{{ $loop->iteration }}</td>
                                                       <td>{{$subscribtion->parentid}}</td>
                                                       <td>{{$subscribtion->packageType}}</td>
                                                       <td>{{$subscribtion->packageName}}</td>
                                                       <td>{{$subscribtion->billingCycle}}</td>
                                                       <td>{{$subscribtion->description}}</td>
                                                       <td>{{$subscribtion->price}}</td>
                                                       <td>{{$subscribtion->isRenewal}}</td>
                                                       <td>
                                                            <a href="{{ route('admin.delete.subscription', $subscribtion->id) }}" onclick="return confirm('Are you sure?')" class="btn text-danger"><i class="mdi mdi-delete"
                                                                      style=" font-size: 20px"></i></a>

                                                            <a href="{{route('admin.edit.subscription', $subscribtion->id)}}"
                                                                 class="btn text-info"><i class="mdi mdi-table-edit"
                                                                      style=" font-size: 20px"></i></a>
                                                            <a href="" class="btn"><i class="mdi mdi-eye" style=" font-size: 20px"></i></a>
                                                       </td>
                                                  </tr>
                                                  @endforeach
                                             </tbody>
                                        </table>
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