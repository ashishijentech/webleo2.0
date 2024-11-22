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
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Create Elements</h4>
                                    <form action="{{ route('superadmin.element.store') }}" method="post">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="">Elements name:</label>
                                            <input type="text" class="form-control  form-control-sm" name="element_name">
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Create Component</h4>
                                    <form action="{{ route('superadmin.component.store') }}" method="post">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="">Select Elements:</label>
                                            <select name="elements" class="form-control orm-control-sm">
                                                <option selected @disabled(true)>Please select element</option>
                                                @foreach ($element as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Component name:</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="component_name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Component value:</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="component_value">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Elements list</h4>
                                    <table class="table table-bordered">
                                        <thead class="text-white" style="background-color: #464DEE">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Elements name</th>
                                                <th scope="col">Components</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($element as $item)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        <a href="{{ route('superadmin.element.component', ['element_id' => $item->id]) }}"
                                                            class="btn" data-toggle="tooltip"
                                                            title="Click to view components list"><i class="mdi mdi-eye"
                                                                style="font-size: 20px"></i></a>
                                                    </td>
                                                    <td><a href=" " class="btn text-danger"><i class="mdi mdi-delete"
                                                                style=" font-size: 20px"></i></a> <a href=""
                                                            class="btn text-info"><i class="mdi mdi-table-edit"
                                                                style=" font-size: 20px"></i></a></td>
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

    <script>
        $(document).ready(function() {
            $("body").tooltip({
                selector: '[data-toggle=tooltip]'
            });
        });
    </script>
@endsection
