@extends('layouts.manufacturerapp')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="container mt-5">
                    <h3 class="text-center">Manage Bar Code Allocation</h3>
                    <p class="text-center text-muted">It shows the list of Bar Code allocation</p>
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="card text-white bg-total mb-3">
                                <div class="card-body">
                                    {{-- <i class="fa-solid fa-barcode"></i> --}}
                                    <h5 class="card-title text-white">5347</h5>
                                    <p class="card-text text-white">TOTAL DEVICE</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white mb-3" style="background-color: #086c57">
                                <div class="card-body">
                                    <h5 class="card-title text-white">86</h5>
                                    <p class="card-text text-white">AVAILABLE DEVICE</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white mb-3" style="background-color: #e9b517">
                                <div class="card-body">
                                    <h5 class="card-title text-white">5261</h5>
                                    <p class="card-text text-white">ALLOCATED DEVICE</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">3449</h5>
                                    <p class="card-text">INSTALLED DEVICE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="search" placeholder="search">
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#allocate-barcode">
                                        Allocate Barcodes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">


                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Allocate Barcode</h4>
                                    <form action="" method="post">
                                        @csrf
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="">Country</label>
                                                <select name="country" class="form-control form-control-sm country">
                                                    <option disabled @selected(true)>Choose Country
                                                    </option>
                                                    <option value="china" @selected(old('country') == 'china')>China
                                                    </option>
                                                    <option value="india" @selected(old('country') == 'india')>India
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="form-label">State</label>
                                                <select class="form-control form-control-sm state" name="state"
                                                    id=""></select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Distributor
                                                    {{-- <span
                                                    class="text-danger">*</span> --}}
                                                </label>
                                                <Select class="form-control" name="distributor" id="distributor">
                                                    <option value="">Select Distributor</option>
                                                </Select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Element<span
                                                        class="text-danger">*</span></label>
                                                <Select class="form-control" name="element" id="element">
                                                    <option value="">Select Element</option>
                                                    @foreach ($element as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}
                                                        </option>
                                                    @endforeach
                                                </Select>
                                            </div>
                                            {{-- <div class="col-md-3">
                                                <label for="">Select Barcodes</label>
                                                <select name="" id="" class="form-control form-control-sm">
                                                    @foreach ($imei as $item)
                                                        <option value="">{{ $item->IMEI_NO }}</option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            <label>Select Barcodes<span class="batch">*</span></label><br>
                                            <select data-placeholder="Select Barcode" multiple
                                                class="form-control chosen-select " name="language_known" tabindex="8">
                                                <option></option>
                                                @foreach ($imei as $item)
                                                    <option value="">{{ $item->IMEI_NO }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-primary my-2">Allocate</button>
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

    <!-- Modal -->
    <div class="modal fade" id="allocate-barcode" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .bg-total {
            background: rgb(53, 88, 230);

        }
    </style>

    <script>
        $(document).ready(function() {
            $('.state').change(function() {
                $('#distributor').empty();
                const state = $(this).val();
                alert(state);
                if (state) {
                    $.ajax({
                        url: `/manufacturer/fetch/distributer/${state}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            alert(JSON.stringify(data));
                            data.forEach(distributer => {
                                $(`#distributor`).append(`
                    <option value="${distributer.id}">${distributer.business_name}</option>
                  `);
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
