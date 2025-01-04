@extends('layouts.manufacturerapp')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="my-2" style="background-color: #260950">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="card-title text-white px-2 py-3">Manage Bar Codes</h4>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex flex-wrap justify-content-md-end justify-content-sm-center">
                                <div class="p-2 text-white">
                                    {{-- <a href="" class="btn btn-sm text-white"
                                            style="border: 1px solid #fff">Add
                                            Element</a>  --}}
                                    <button type="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                        data-bs-target="#add_barcode" style="border: 1px solid #fff;white-space: nowrap;">
                                        Add
                                        Barcode
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> {{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card p-2 my-2">
                        <h3 class="card-header"><i>Barcode List</i></h3>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Device Serial No</th>
                                        <th>IMEI No </th>
                                        <th>Type</th>
                                        <th>Model No</th>
                                        <th>Part No </th>
                                        <th>Barcode Type</th>
                                        <th>Created At </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($barcode as $key => $value)
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal" title="Device Info!">
                                                        {{ $barcode[$key]->serialNumber }}
                                                    </button>
                                                </td>
                                                <td>{{ $barcode[$key]->serialNumber }}</td>
                                                <td>{{ $barcode[$key]->elementType->pluck('type')->first() }}</td>
                                                <td>{{ $barcode[$key]->modelNo->pluck('model_no')->first() }}</td>
                                                <td>{{ $barcode[$key]->partNo->pluck('part_no')->first() }}</td>
                                                <td>NEW</td>
                                                <td>{{ $barcode[$key]->created_at }}</td>
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



    <div class="modal fade" id="add_barcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Manage Barcode</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="device-part-model">
                    <form action="{{ route('manufacturer.store.barcode') }}" method="post">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="" class="form-label">Select Element</label>
                                <select name="element" class="form-select form-select-sm element">
                                    <option selected disabled>Element List:</option>
                                    @foreach ($element as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Select Type</label>
                                <select name="element_type" class="form-select form-select-sm element_type"></select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="" class="form-label">Select Model No</label>
                                <select name="model_no" class="form-select form-select-sm model-no">
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Enter Device Part No</label>
                                <select name="device_part_no" class="form-select form-select-sm partNo"></select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="voltage" class="form-label">Voltage</label>
                                <input type="text" class="form-control form-control-sm" name="voltage" value="12v">
                            </div>

                            <div class="col-md-3">
                                <label for="batchNo" class="form-label">Batch No</label>
                                <input type="text" name="batchNo" id="batchNo" value="{{ $batchNo }}"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="col-md-3">
                                <label for="BarCodeCreationType" class="form-label">BarCode Creation
                                    Type </label>
                                <select class="form-select form-select-sm" name="BarCodeCreationType"
                                    id="BarCodeCreationType">
                                    <option value="select type">Select Creation Type</option>
                                    <option value="Other">Other</option>
                                    <option value="Import">Import</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="form-label">Barcode No</label>
                                <input type="text" class="form-control form-control-sm" name="barcodeNo">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label">Is Renew</label><br>
                                <select name="is_renew" id="" class="form-select form-select-sm">
                                    <option value="1">Yes</option>
                                    <option value="0">Yes</option>
                                </select>
                            </div>
                            <div class="col-md-3" id="unique_id">
                                <div class="mb-3">
                                    <label for="UniqueID" class="form-label">Unique ID</label>
                                    <input type="text" name="UniqueID" id="UniqueID"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2" id="customFields">

                        </div>

                        <button class="btn btn-sm me-2" style="background-color: #260950">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-sm" style="background-color: #260950">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Details Modal --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        th {
            color: #260950;

        }

        table,
        thead,
        tbody {
            border-color: #260950;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        < script >
            // Initialize tooltips globally
            document.addEventListener('DOMContentLoaded', function() {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
    </script>

    </script>
    <script>
        $(document).ready(function() {
            const $element = $('.element');
            $element.on('change', function() {
                const selectedValue = $(this).val();
                console.log('Selected Value:', selectedValue); // Log the selected value for debugging
                const $form = $(this).parents("form"); // Cache the form for reuse
                const $elementType = $form.find(
                    ".element_type"); // Target the dropdown within the same form

                $elementType.empty(); // Clear previous options
                $elementType.append('<option value="">Loading...</option>'); // Temporary loading indicator

                $.ajax({
                    url: `/superadmin/fetch/element-type/${selectedValue}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $elementType.empty(); // Clear loading message
                        if (data && data.length > 0) {
                            data.forEach(type => {
                                $elementType.append(
                                    `<option value="${type.id}">${type.type}</option>`
                                );
                            });
                        } else {
                            $elementType.append(
                                '<option value="">No options available</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log the error for debugging
                        $elementType.empty();
                        $elementType.append('<option value="">Failed to load options</option>');
                    }
                });

                $.ajax({
                    url: `/fetch/customFields/element/${selectedValue}/element`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data && data.length > 0) {
                            alert(JSON.stringify(data));
                            // data.forEach(type => {
                            //     $elementType.append(
                            //         `<option value="${type.id}">${type.type}</option>`
                            //     );
                            // });
                        } else {
                            alert('Data not available');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log the error for debugging

                        alert('Failed to load options');
                    }
                });

            });

            const $element_type = $('.element_type');
            $element_type.on('change', function() {
                alert($(this).val());
                const $form = $(this).parents("form"); // Cache the form for reuse
                const $model_no = $form.find(
                    ".model-no"); // Target the dropdown within the same form
                const $customFieldsContainer = $form.find(
                    ".type");
                $customFieldsContainer.remove();
                $model_no.empty(); // Clear previous options
                $model_no.append('<option value="">Loading...</option>'); // Temporary loading indicator

                $.ajax({
                    url: `/superadmin/fetch/model-no/${$(this).val()}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $model_no.empty(); // Clear loading message
                        if (data && data.length > 0) {
                            data.forEach(modelNo => {
                                $model_no.append(
                                    `<option value="${modelNo.id}">${modelNo.model_no}</option>`
                                );
                            });
                        } else {
                            $model_no.append(
                                '<option value="">No options available</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log the error for debugging
                        $model_no.empty();
                        $model_no.append('<option value="">Failed to load options</option>');
                    }
                });


                $.ajax({
                    url: `/fetch/customFields/element/${$(this).val()}/type`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data && data.length > 0) {
                            const $customFieldsContainer = $('#customFields');
                            data.forEach(fields => {
                                alert(JSON.stringify(fields));
                                let fieldHtml =
                                    ''; // Initialize variable to store HTML content

                                switch (fields.colSize) {
                                    case 2:
                                        fieldHtml = `
                                  <div class="col-md-3 type">
                                  <label>${fields.select}</label>
                                    <input type="${fields.inputType}" class="form-control form-control-sm" name="${fields.id}">
                                  </div>
                                   `;
                                        break;
                                    case 4:
                                        fieldHtml = `
                                  <div class="col-md-3 type">
                                  <label>${fields.select}</label>
                                    <input type="${fields.inputType}" class="form-control form-control-sm" name="${fields.id}">
                                  </div>
                                   `;
                                        break;
                                    case 6:
                                        fieldHtml = `
                                  <div class="col-md-6">
                                  <label>${fields.select}</label>
                                    <input type="${fields.inputType}" class="form-control form-control-sm" name="${fields.select}">
                                  </div>
                                   `;
                                        break;

                                        // Add more cases here if needed
                                        // e.g., case 6, case 12, etc.

                                    default:
                                        console.warn(
                                            `Unsupported colSize: ${fields.colSize}`
                                        );
                                        break;
                                }

                                // Append the generated HTML if it's not empty
                                if (fieldHtml) {
                                    $customFieldsContainer.append(fieldHtml);
                                }
                            });
                        } else {
                            console.warn('No fields available to display.');
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log the error for debugging

                        alert('Failed to load options');
                    }
                });
            })


            const $modelNo = $('.model-no');
            $modelNo.on('change', function() {
                alert($(this).val());
                const $form = $(this).parents("form"); // Cache the form for reuse
                const $partNo = $form.find(
                    ".partNo"); // Target the dropdown within the same form
                $partNo.empty(); // Clear previous options
                $partNo.append('<option value="">Loading...</option>'); // Temporary loading indicator


                $.ajax({
                    url: `/superadmin/fetch/part-no/${$(this).val()}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $partNo.empty(); // Clear loading message
                        if (data && data.length > 0) {
                            data.forEach(partlNo => {
                                $partNo.append(
                                    `<option value="${partlNo.id}">${partlNo.part_no}</option>`
                                );
                            });
                        } else {
                            $partNo.append(
                                '<option value="">No options available</option>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log the error for debugging
                        $partNo.empty();
                        $partNo.append('<option value="">Failed to load options</option>');
                    }
                });


                $.ajax({
                    url: `/fetch/customFields/element/${$(this).val()}/modelNo`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data && data.length > 0) {
                            alert(JSON.stringify(data));
                            // data.forEach(type => {
                            //     $elementType.append(
                            //         `<option value="${type.id}">${type.type}</option>`
                            //     );
                            // });
                        } else {
                            alert('Data not available');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error); // Log the error for debugging

                        alert('Failed to load options');
                    }
                });

            })
        });
    </script>
@endsection


{{-- <script>
    $(document).ready(function() {
        $('#elementid').change(function() {
            $(".remove").remove();
            const selectedId = $(this).val();

            if (selectedId) {
                $.ajax({
                    url: `/manufacturer/fetch/components/${selectedId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // alert(data);
                        data.forEach(component => {
                            alert(component.type);
                            if (component.type != "select") {
                                inputcontainer = `
                                <div class="col-md-3 remove">
                                    
                                   <label for="input" class="form-label text-capitalize">${component.name}</label>
                                    <input type="${component.type}" class="form-control form-control-sm" name="${component.name}" placeholder="">
                                </div>
                             `
                            } else {
                                inputcontainer = `
                                <div class="col-md-3 remove">
                                   <label for="input" class="form-label text-capitalize">${component.name}</label>
                                   <select class="form-select form-select-sm" name="${component.name}" aria-label="Default select" id="${component.id}" onchange="handleChange(this.value)">
                                    <option selected disabled>Open this select menu</option>       
                                    </select>
                                </div>
                             `

                                $.ajax({
                                    url: `/manufacturer/fetch/options/${component.id}`,
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function(options) {
                                        alert('Options: ' + JSON
                                            .stringify(options));
                                        options.forEach(option => {
                                            $('#' + component
                                                .id).append(`
                                                 <option value="${option.id}">${option.option_value}</option>
                                       `);
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(
                                            'Error fetching options:',
                                            error);
                                    }
                                });

                            }
                            $('#data-container').append(inputcontainer);
                        });
                    },
                    error: function(xhr, status, error) {

                        console.error('Error:', error);
                        alert('Failed to fetch data. Please try again.');
                    }
                });
            } else {
                $('#data-container').html('');
            }
        });
    });
</script>
<script>
    function fetchSubComponents(selectedValue) {
        return $.ajax({
            url: `/manufacturer/fetch/sub-components/${selectedValue}`,
            type: 'GET',
            dataType: 'json',
        });
    }

    function fetchOptions(subComponentId) {
        return $.ajax({
            url: `/manufacturer/fetch/sub-component/options/${subComponentId}`,
            type: 'GET',
            dataType: 'json',
        });
    }

    function handleChange(selectedValue) {
        console.log("Selected value:", selectedValue);
        alert("You selected: " + selectedValue);

        // $().remove(); // Clear previous inputs

        fetchSubComponents(selectedValue)
            .then(data => {
                data.forEach(subcomponent => {
                    if (subcomponent.type === 'select') {
                        const subInputContainer = `
              <div class="col-md-3 remove">
                <label class="form-label text-capitalize">${subcomponent.name}</label>
                <select class="form-select form-select-sm" name="${subcomponent.name}" id="subcomp${subcomponent.id}">
                  <option selected disabled>Open this select menu</option>
                </select>
              </div>
            `;
                        $('#data-container').append(subInputContainer);

                        fetchOptions(subcomponent.id)
                            .then(options => {
                                options.forEach(option => {
                                    $(`#subcomp${subcomponent.id}`).append(`
                    <option value="${option.value}">${option.value}</option>
                  `);
                                });
                            })
                            .catch(error => {
                                console.error('Error fetching options:', error);
                            });
                    } else {
                        const subInputContainer = `
    <div class="col-md-3 remove sub${subcomponent.id}">
        <label class="form-label text-capitalize">${subcomponent.name}</label>
        <input type="${subcomponent.type}" class="form-control form-control-sm" name="subcomponent.name" 
               >
    </div>
`;
                        $('.sub' + subcomponent.id).remove();
                        $('#data-container').append(subInputContainer);


                    }
                });
            })
            .catch(error => {
                console.error('Error fetching sub-components:', error);
            });
    }
</script> --}}
