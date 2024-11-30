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
                                    <div class="card">
                                        <div class="my-3 mx-3">
                                            <div class="row" id ="data-container">
                                                <div class="col-md-3" >
                                                    <label for="" class="form-label">Select Element</label>
                                                    <Select class="form-control" name="elementid" id="elementid">
                                                        <option value="" hidden>Select Parent</option>
                                                        @foreach ($element as $e)
                                                        <option value="{{$e->id}}">{{$e->name}}</option>
                                                        @endforeach
                                                    </Select>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- <div id="data-container">
                                            
                                        </div> -->


                                        <!-- <div class="mb-3 mx-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Gender<span
                                                            class="text-danger">*</span></label>
                                                    <select name="gender" id=""
                                                        class="form-select form-select-sm state">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Mobile<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        name="mobile" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Date Of Birth<span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="DOB">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Age<span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        name="age" value="" readonly>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="mb-3 mx-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Is Map Device Edit <span
                                                            class="text-danger">*</span></label><br>
                                                    <div class="form-check form-check-inline">

                                                        <input type="radio" id="yes" name="map_device_edit"
                                                            value="yes" class="form-check-input">
                                                        <label for="yes">Yes</label>

                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="no" name="map_device_edit"
                                                            value="no" class="form-check-input" checked>
                                                        <label for="no">No</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Pan Number<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="pan_number" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Occupation<span
                                                            class="text-danger">*</span></label>
                                                    <select name="occupation" id=""
                                                        class="form-select form-select-sm state">
                                                        <option value="" hidden>Select Occupation</option>
                                                        <option value="Business Man">Business Man</option>
                                                        <option value="Student">Student</option>
                                                        <option value="House Wife">House Wife</option>
                                                        <option value="VRS Employees">VRS Employees
                                                        </option>
                                                        <option value="Retired Employees">Retired
                                                            Employees</option>
                                                        <option value="Self Employed">Self Employed
                                                        </option>
                                                        <option value="Private Employees">Private
                                                            Employees</option>
                                                        <option value="Marketing Executives">Marketing
                                                            Executives</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Payment Type<span
                                                            class="text-danger">*</span></label>
                                                    <select name="paymentType" id=""
                                                        class="form-select form-select-sm state">
                                                        <option value="" hidden>Select Occupation</option>
                                                        <option value="Advasnce">Advasnce</option>
                                                        <option value="After Delivered">After Delivered
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="mb-3 mx-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Advance Payment<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        name="Advance_Payment" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Languages Known<span
                                                            class="text-danger">*</span></label><br>
                                                    <select data-placeholder="Select Categories" multiple
                                                        class="chosen-select form-select form-select-sm"
                                                        tabindex="8">
                                                        <option>Design</option>
                                                        <option>HTML5</option>
                                                        <option>CSS3</option>
                                                        <option>jQuery</option>
                                                        <option>BS4</option>
                                                        <option>Bootstrap</option>
                                                        <option>WordPress</option>
                                                        <option>FrontEnd</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- <div class="card my-3 py-3">
                                        <div class="mb-3 mx-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Country<span
                                                            class="text-danger">*</span></label>
                                                    <select name="country" class="form-select form-select-sm state">
                                                        <option value="India">India</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">State<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="state" value="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">RTO Division<span
                                                            class="text-danger">*</span></label>
                                                    <select name="rtoDivision" id="rtoDivision"
                                                        class="form-select form-select-sm state">
                                                        <option value="" hidden>Select State</option>
                                                        <option value="OD 29">OD 29</option>
                                                        <option value="OD 21">OD 21</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="card my-3 py-3">
                                        <div class="mb-3 mx-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Address Type<span
                                                            class="text-danger">*</span></label>
                                                    <select name="AddressType" id=""
                                                        class="form-select form-select-sm state">
                                                        <option value="" hidden>Select Address Type
                                                        </option>
                                                        <option value="Permanent">Permanent</option>
                                                        <option value="Temporary">Temporary</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="">Country<span
                                                            class="text-danger">*</span></label>
                                                    <select name="country2" id=""
                                                        class="form-select form-select-sm state">
                                                        <option value="india">India</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">State<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="state2" value="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">District<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="District" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 mx-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Pin Code<span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        name="pincode" value="">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Area<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="Area" value="area">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Address<span
                                                            class="text-danger">*</span></label>
                                                    <textarea type="text" class="form-control Alphanumeric AddressValidation" maxlength="500" name="address"
                                                        style="width: 365px; height: 118px;" value=''> </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <button type="submit" class="btn btn-primary">Save</button> -->
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
                        
                        $("div").remove(".remove");

                        data.forEach(item => {
                            const inputGroup = `
                                <div class="col-md-3 remove">
                                    <label for="input-${item.id}" class="form-label">${item.name}</label>
                                    <input type="${item.type}" class="form-control" id="input-${item.id}" name="${item.name}" value="${item.value}">
                                </div>
                            `;
                            
                            $('#data-container').append(inputGroup);
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



