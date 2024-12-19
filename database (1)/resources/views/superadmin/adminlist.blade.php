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
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($details) >= 1)
                                        @foreach ($details as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/' . $item->logo) }}" alt="Logo"
                                                        style="width:50px;height:50px;"></td>
                                                <td>{{ $item->business_name }}</td>
                                                <td>{{ $item->usr->name }}</td>
                                                <td>{{ $item->usr->email }}</td>
                                                <td>{{ $item->contact_no }}</td>
                                                <td>
                                                    <a href="{{ route('superadmin.admin.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{route('superadmin.admin.destroy',$item->id)}}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="7">Data not available</td>
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