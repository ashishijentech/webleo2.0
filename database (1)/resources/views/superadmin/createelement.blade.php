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
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Create Elements</h4>
                                <form action="{{ route('superadmin.element.store') }}" method="post">
                                    @csrf
                                    <div class="mb-2">
                                        <label for="">Elements name:</label>
                                        <input type="text" class="form-control form-control-sm" name="element_name">
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
                                        <select name="elements" class="form-control form-control-sm">
                                            <option selected @disabled(true)>Please select element</option>
                                            @foreach ($element as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Component name:</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="component_name">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Select Type:</label>
                                                <select name="type" id="type"
                                                    class="form-control form-control-sm">
                                                    <option selected>Select Option</option>
                                                    <option value="text">Text</option>
                                                    <option value="email">Email</option>
                                                    <option value="number">Number</option>
                                                    <option value="file">File</option>
                                                    <option value="select">Select</option>
                                                    <option value="Radio">Radio</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4" id="component-value-container">
                                                <label for="">Component value:</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="component_value">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="select-options-container" style="display: none;">
                                        <label for="">Options:</label>
                                        <div id="select-options">
                                            <div class="row mb-2">
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="options[]" placeholder="Option value">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button" class="btn btn-success btn-sm add-option">Add
                                                        More</button>
                                                </div>
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

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Sub Component</h4>
                        <form action="{{ route('superadmin.subcomponent.store') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-4 mb-2" id="comp-container">
                                        <label for="">Select Component:</label>
                                        <select class="form-select form-select-sm" name="component" id="component">
                                            <option disabled selected>components List:</option>
                                            @foreach ($components as $item)
                                            <option value="{{ $item->id }}" type="{{ $item->type }}">
                                                {{ $item->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label for="">Sub Component Name:</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="sub_component_name">
                                    </div>
                                    <div class="col-md-3 mb-2" id="sub_component_type_cont">
                                        <label for="">Sub Component Type:</label>
                                        <select name="sub_component_type" id="sub_component_type"
                                            class="form-select form-select-sm">
                                            <option selected>Select Option</option>
                                            <option value="text">Text</option>
                                            <option value="email">Email</option>
                                            <option value="number">Number</option>
                                            <option value="file">File</option>
                                            <option value="select">Select</option>
                                            <option value="Radio">Radio</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div id="sub-options-container" style="display:none;">
                                            <label for="">Options:</label>
                                            <div id="select-options">
                                                <div class="row mb-2">
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="options[]" placeholder="Option value">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <button type="button" class="btn btn-success btn-sm"
                                                            id="add_suv_comp_opt">Add
                                                            More</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
</div>

{{-- Element List --}}
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
                                    <a href=" " class="btn text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="mdi mdi-delete"
                                            style=" font-size: 20px"></i></a>

                                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Element</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form id="editForm" action="{{ route('superadmin.element.edit', ['id' => $item->id]) }} " method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="itemName" class="form-label">Enter new element name</label>
                                                            <input type="text" class="form-control" id="itemName" name="name" value="" required>
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
                                                        <p>Are you sure you want to delete this element?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form id="deleteForm" action=" {{ route('superadmin.element.destroy', ['id' => $item->id]) }} " method="POST">
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