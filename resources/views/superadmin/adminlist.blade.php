@extends('layouts.superadminapp')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Admin List</h4>
                                </div>
                                <table class="table table-bordered">
                                    <thead class="text-white" style="background-color: #464DEE">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Business Name </th>
                                            <th scope="col">Owner Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact No</th>
                                            {{-- <th scope="col">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($details)>= 1)
                                          @foreach ($details as $item)
                                        <tr>
                                         <td>{{$loop->iteration}}</td>
                                         <td><img src="{{ asset('storage/'.$item->pluck('logo')->first()) }}"></td>
                                         <td>{{$item->pluck('business_name')->first()}}</td>
                                         <td>{{$item->pluck('usr')->pluck('name')->first()}}</td>
                                         <td>{{$item->pluck('usr')->pluck('email')->first()}}</td>
                                         <td>{{$item->pluck('contact_no')->first()}}</td>
                                        </tr>   
                                        @endforeach   
                                        @else
                                        <tr class="text-center">
                                            <td colspan="6">Data not available</td>
                                        </tr>  
                                        @endif
                                       

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
