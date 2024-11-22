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
                                    <h4 class="card-title">Component List <small style="font-size:10px">(by element)</small></h4> 
                                    <table class="table table-bordered">
                                        <thead class="text-white" style="background-color: #464DEE">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Components name</th>
                                            <th scope="col">Components value</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($component as $item)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->value}}</td>
                                                <td><a href=" " class="btn text-danger"><i class="mdi mdi-delete" style=" font-size: 25px"></i></a> <a href="" class="btn text-info"><i class="mdi mdi-table-edit" style=" font-size: 25px"></i></a></td>
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
@endsection
