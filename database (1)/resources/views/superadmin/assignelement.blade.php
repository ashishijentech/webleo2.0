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
                                <h4 class="card-title">Assign Element To Admin</h4>
                                <form action="{{route('superadmin.assign.element.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="">Select Elements:</label>
                                                <select name="element" class="form-control orm-control-sm">
                                                    <option selected @disabled(true)>Please select element</option>
                                                    @foreach ($element as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="">Select Admin:</label>
                                                <select name="admin" class="form-control orm-control-sm">
                                                    <option selected @disabled(true)>Please select admin</option>
                                                    @foreach ($admin as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">
                                        Assign</button>
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