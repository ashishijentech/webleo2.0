@extends('layouts.manufacturerapp')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container-fluid">
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
                                    <h4 class="card-title">Barcode list</h4>

                                    @foreach ($barcode as $item)
                                        {{-- {{ $loop->iteration }} --}}
                                        <table class="table table-bordered text-capitalize">
                                            <tbody>
                                                @foreach ($item as $data)
                                                    {{-- {{ $loop->iteration }} --}}

                                                    <tr>
                                                        @if ($data->label == 'barcode')
                                                            <td style="font-weight: bold"
                                                                class="bg-dark text-white
                                                                p-2">
                                                                <span>{{ $data->label }}</span>
                                                            </td>
                                                        @else
                                                            <td style="font-weight: bold">
                                                                <span>{{ $data->label }}</span>
                                                            </td>
                                                        @endif

                                                        <td>{{ $data->value }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
