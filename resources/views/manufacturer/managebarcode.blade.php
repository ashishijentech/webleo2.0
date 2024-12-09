@extends('layouts.manufacturerapp')

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
                                    <h4 class="card-title">Manage Barcode</h4>
                                    <form action="" method="post" id="edit_Distributer">
                                        @csrf
                                        <div class="card p-3">
                                            <div class="my-3 mx-3">
                                                <div class="row" id ="data-container">
                                                    <div class="col-md-3">
                                                        <label for="" class="form-label">Select Element</label>
                                                        <Select class="form-control" name="elementid" id="elementid">
                                                            <option value="" hidden>Select Parent</option>
                                                            @foreach ($element as $e)
                                                                <option value="{{ $e->id }}">{{ $e->name }}
                                                                </option>
                                                            @endforeach
                                                        </Select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#elementid').change(function() {

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
                                    <input type="${component.type}" class="form-control" placeholder="">
                                </div>
                             `
                            } else {
                                inputcontainer = `
                                <div class="col-md-3 remove">
                                   <label for="input" class="form-label text-capitalize">${component.name}</label>
                                   <select class="form-select" aria-label="Default select" id="${component.id}">
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
                                                 s<option value="${option.option_value}">${option.option_value}</option>
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
