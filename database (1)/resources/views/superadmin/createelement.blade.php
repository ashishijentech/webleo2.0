@extends('layouts.superadminapp')

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
                    <div class="my-2" style="background-color: #260950">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="card-title text-white px-2 py-3">Manage Elements</h4>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex flex-wrap justify-content-end">
                                    <div class="p-2 text-white"><a href="" class="btn btn-sm text-white"
                                            style="border: 1px solid #fff">Details</a></div>
                                    <div class="p-2 text-white">
                                        {{-- <a href="" class="btn btn-sm text-white"
                                            style="border: 1px solid #fff">Add
                                            Element</a>  --}}
                                        <button type="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#add_element" style="border: 1px solid #fff">
                                            Add
                                            Element
                                        </button>
                                        <button type="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#add_element_type" style="border: 1px solid #fff">
                                            Add
                                            Element Type
                                        </button>
                                        <button type="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                            data-bs-target="#add_device_model_no" style="border: 1px solid #fff">
                                            Add
                                            Device Model No
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Element List --}}
                <div class="card">
                    <div class="card-body">
                        <h4 class="">Elements list</h4>
                        <table class="table table-bordered">
                            <thead class="text-white" style="background-color: #260950">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Elements name</th>
                                    <th scope="col">Components</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($element))
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
                                            <td>
                                                <a href=" " class="btn text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"><i class="mdi mdi-delete"
                                                        style=" font-size: 20px"></i></a>

                                                <div class="modal fade" id="editModal" tabindex="-1"
                                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Edit Element
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form id="editForm"
                                                                    action="{{ route('superadmin.element.edit', ['id' => $item->id]) }} "
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="itemName" class="form-label">Enter new
                                                                            element name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="itemName" name="name" value=""
                                                                            required>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary mt-2">Save
                                                                        Changes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <a href="" class="btn text-info" data-bs-toggle="modal"
                                                    data-bs-target="#editModal"><i class="mdi mdi-table-edit"
                                                        style=" font-size: 20px"></i></a>

                                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Confirm
                                                                    Delete</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this element?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form id="deleteForm"
                                                                    action=" {{ route('superadmin.element.destroy', ['id' => $item->id]) }} "
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="5">Data not available</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--Add Element Modal -->
    <div class="modal fade" id="add_element" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Add Element</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('superadmin.element.store') }}" method="post">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">Elements name:</label>
                            <input type="text" class="form-control form-control-sm" name="element_name"
                                placeholder="Enter element name">
                        </div>
                        <button type="submit" class="btn btn-sm me-2" style="background-color: #260950">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-sm" style="background-color: #260950">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <!--Add Element Type Modal -->
    <div class="modal fade" id="add_element_type" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Add Element Type</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('superadmin.element.type.store') }}" method="post">
                        @csrf
                        <div class="my-2">
                            <label for="" class="form-label">Select Element</label>
                            <select name="element" class="form-select form-select-sm">
                                <option selected disabled>Element List:</option>
                                @foreach ($element as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Type</label>
                            <input type="text" class="form-control form-control-sm" name="type"
                                placeholder="Enter type">
                        </div>
                        <button type="submit" class="btn btn-sm me-2" style="background-color: #260950">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-sm" style="background-color: #260950">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <!--Add device Model No -->
    <div class="modal fade" id="add_device_model_no" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Add Device Model Number</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('superadmin.model_no.store') }}" method="post">
                        @csrf
                        <div class="my-2">
                            <label for="" class="form-label">Select Element</label>
                            <select name="element" class="form-select form-select-sm" id="element">
                                <option selected disabled>Element List:</option>
                                @foreach ($element as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Select Type</label>
                            <select name="" class="form-select form-select-sm" id="element_type"></select>
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Model No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter model no">
                        </div>
                        <button type="submit" class="btn btn-sm me-2" style="background-color: #260950">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-sm" style="background-color: #260950">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const $element = $('#element');
            $element.on('change', function() {
                alert($(this).val());
                $('#element_type').empty();
                $.ajax({
                    url: `/superadmin/fetch/element-type/${$(this).val()}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        alert(data);
                        data.forEach(type => {
                            $('#element_type').append(`
                                                 <option value="${type.id}">${type.type}</option>
                                       `);
                        });
                    }
                })

            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("body").tooltip({
                selector: '[data-toggle=tooltip]'
            });
        });

        $(document).ready(function() {
            const $typeSelect = $('#type');
            const $componentValueContainer = $('#component-value-container');
            const $componentValueInput = $('#component-value');
            const $selectOptionsContainer = $('#select-options-container');
            const $selectOptions = $('#select-options');

            // Handle type change
            $typeSelect.on('change', function() {
                if ($(this).val() === 'select') {
                    $componentValueContainer.hide();
                    $componentValueInput.val('');
                    $selectOptionsContainer.show();
                } else {
                    $componentValueContainer.show();
                    $selectOptionsContainer.hide();
                }
            });

            // Handle adding more options
            $selectOptions.on('click', '.add-option', function() {
                const newOptionRow = `
            <div class="row mb-2">
                <div class="col-md-8">
                    <input type="text" class="form-control form-control-sm" name="options[]" placeholder="Option value">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger btn-sm remove-option">Remove</button>
                </div>
            </div>
        `;
                $selectOptions.append(newOptionRow);
            });

            // Handle removing an option
            $selectOptions.on('click', '.remove-option', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            const $component = $('#component');
            $component.on('change', function() {
                var selectedOption = $(this).find(':selected');
                // Get the custom attribute value
                var type = selectedOption.attr('type');
                alert(type);
                if (type == 'select') {
                    $('#comp-container').after(
                        `<div class = "col-md-4 mb-2"
                        id = "comp_val_con" >
                        <label> Component Values </label> 
                        <select class ="form-select form-select-sm" id = "component_options" name="component_values">
                        <option selected disabled> Select Component Value </option> 
                        < /select>  
                        </div>`
                    );
                    // alert('this is select' + $(this).val());

                    $.ajax({
                        url: `/superadmin/fetch-component/${$(this).val()}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // alert(data);
                            data.forEach(element => {

                                // alert(element.option_value);
                                $('#component_options').append(`
                                                 <option value="${element.id}">${element.option_value}</option>
                                       `);
                            });
                        }
                    });




                } else {
                    $('#comp_val_con').remove();
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            const $sub_component_type = $('#sub_component_type');
            $sub_component_type.on('change', function() {
                $('.input_remove').remove();
                if ($(this).val() == 'select') {
                    $("#sub-options-container").css("display", "block");

                } else {
                    $("#sub-options-container").css("display", "none");
                    $("#sub_component_type_cont").after(
                        ` <div class="col-md-4 input_remove">
                        <label class="">Value:</label>
                        <input class="form-control form-control-sm " type="${$(this).val()}" placeholder="Enter value" name="value"> 
                        </div>
                        `
                    );

                }

            });

        });
    </script>

    <script>
        $("#add_suv_comp_opt").on('click', function() {
            const newOptionRow = ` 
            <div class="row mb-2">
                <div class="col-md-8">
                    <input type="text" class="form-control form-control-sm" name="options[]" placeholder="Option value">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger sub-opt-remove">Remove</button>
                </div>
            </div>`;
            $('#sub-options-container').append(newOptionRow);
        });

        $(document).on('click', '.sub-opt-remove', function() {
            $(this).closest('.row').remove(); // Removes the specific row
        });
    </script>













@endsection
