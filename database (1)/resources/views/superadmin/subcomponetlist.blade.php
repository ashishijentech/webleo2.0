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
                                <h4 class="card-title">Sub Component List <small style="font-size:10px">(by component)</small></h4>
                                <table class="table table-bordered">
                                    <thead class="text-white" style="background-color: #464DEE">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">SubComponents name</th>
                                            <th scope="col">SubComponents value</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcomponent as $item)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->value}}</td>
                                            <td>
                                                <a href=" " class="btn text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="mdi mdi-delete"
                                                        style=" font-size: 20px"></i></a>

                                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Edit Component</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form id="editForm" action="{{ route('superadmin.subcomponent.edit', ['id' => $item->id]) }} " method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="itemName" class="form-label">Enter new component name</label>
                                                                        <input type="text" class="form-control" id="itemName" name="name" value="" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="itemValue" class="form-label">Enter new value</label>
                                                                        <input type="text" class="form-control" id="itemValue" name="value" value="" required>
                                                                    </div>

                                                                    <button type="submit" class="btn btn-primary mt-2">Save Changes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <a href="" class="btn text-info" data-bs-toggle="modal" data-bs-target="#editModal"><i class="mdi mdi-table-edit"
                                                        style=" font-size: 20px"></i></a>

                                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this component?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form id="deleteForm" action="{{ route('superadmin.subcomponent.destroy', ['id' => $item->id]) }} " method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
@endsection