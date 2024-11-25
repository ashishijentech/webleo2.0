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
                         <div class="col-md-12 grid-margin stretch-card mx-auto">
                              <div class="card">
                                   <div class="card-body">
                                        <table class="table table-hover table-sm">
                                             <thead>
                                                  <tr>
                                                       <th scope="col" style="width: 5%;">#</th>
                                                       <th scope="col" style="width: 5%;">Parent name</th>
                                                       <th scope="col" style="width: 5%;">Package Type</th>
                                                       <th scope="col" style="width: 5%;">Package Name</th>
                                                       <th scope="col" style="width: 5%;">Billing Cycle</th>
                                                       <th scope="col" style="width: 5%;">Description</th>
                                                       <th scope="col" style="width: 5%;">Price</th>
                                                       <th scope="col" style="width: 5%;">isRenewal</th>
                                                       <th scope="col" style="width: 5%;">Action</th>
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
                                                            
                                                            <a href="{{route('admin.edit.subscription', $subscribtion->id)}}"  class="btn btn-primary btn-sm"  onclick="return confirm('Are you sure?')">Edit</a>
                                                           
                                                            <form action="{{ route('admin.delete.subscription', $subscribtion->id) }}" method="POST">
                                                                 @csrf
                                                                 @method('DELETE')
                                                                 <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                            </form>

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