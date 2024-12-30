@extends('layouts.manufacturerapp')

@section('content')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <h4 class="card-title px-2">Manage Barcode</h4>
                {{-- <div class="container-fluid"> --}}
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
                                <h4 class="card-title">Add Barcode</h4>
                                <form action="{{ route('manufacturer.store.barcode') }}" method="post"
                                    id="edit_Distributer">
                                    @csrf
                                    <div class="my-3 mx-3">
                                        <div class="row" id ="data-container">
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Select Element</label>
                                                <Select name="element" id="elementid" class="form-select form-select-sm">
                                                    <option value="" hidden>Select Parent</option>
                                                    @foreach ($element as $e)
                                                        <option value="{{ $e->id }}">{{ $e->name }}
                                                        </option>
                                                    @endforeach
                                                </Select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="file" class="form-label">Creation
                                                    type</label>
                                                <input type="file" name="file" id="file"
                                                    class="form-control form-control-sm" accept=".xlsx, .xls">
                                            </div>
                                            <div class="col-md-3">

                                                <label for="" class="form-label">Barcode No.</label>
                                                <input type="text" name="barcode" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Batch No.</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    value="{{ $batchNo }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Renewal</label>
                                                <select name="" class="form-control" id="" name="renewal">
                                                    <option value="yes">yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="my-2">
                                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
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
</script>
