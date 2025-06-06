<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>My first app in core php</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- datatable call -cdn-->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Load jQuery Repeater Plugin (only once) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>


    <!-- Load jQuery Repeater Plugin (only once) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<!-- Include jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<!-- Include Repeater Plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery.repeater@1.2.1/jquery.repeater.min.js"></script>




    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 20%;
  border: 1px solid #fcefef;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #d69d9d}
</style>


  <!-- Load jQuery (only once) -->

  <!-- Load jQuery Repeater Plugin (only once) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>


</head>
<body   style="background-color:rgb(226, 235, 206);" >




 <div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> Employee Details</h1>
    </div>
        <div class=" d-flex justify-content-center ">
            <div class="col-9 p-4 shadow " >

                {!! Form::open(array('url' => 'Addemployee')) !!}

                    <!--begin::Tab Content-->
                    <div class="tab-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {!! Form::label('first_name', trans('employee.first_name')) !!} <i class="text-danger">*</i>
                                        {!! Form::text('first_name', null, ['class' => 'form-control required', 'placeholder' => 'First Name']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {!! Form::label('first_name', trans('employee.middle_name')) !!}
                                        {!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'Middle Name']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {!! Form::label('first_name', trans('employee.last_name')) !!} <i class="text-danger">*</i>
                                        {!! Form::text('last_name', null, ['class' => 'form-control required', 'placeholder' => 'Last Name']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">

                                <div class="form-group">
                                    {!! Form::label('birth_date', trans('employee.date_of_birth')) !!} <i class="text-danger">*</i>
                                    {!! Form::text('birthdate', null, ['class' => 'form-control','id'=>'datepicker', 'placeholder' => 'dd/mm/yyyy']) !!}

                                </div>


                                    <div class="form-group">
                                        {!! Form::label('age', trans('employee.age_years')) !!} <i class="text-danger">*</i>
                                        {!! Form::number('age', null, [
                                            'class' => 'form-control required',
                                            'readonly' => 'readonly',
                                            'id' => 'age',
                                            'placeholder' => 'Age',
                                        ]) !!}
                                    </div>
                                </div>


                                <div class="form-group col-lg-4">





    {!! Form::label('department', trans('Branch')) !!}<i class="text-danger">*</i>
    {{ Form::select('department', ['' => '-- Select Department --'] + $department,null , [
        'class' => 'form-control required',
        'id' => 'departmentid',
        'data-placeholder' => 'Select Branch',
    ]) }}



    {!! Form::label('designation', trans('Designation')) !!}<i class="text-danger">*</i>
    {{ Form::select('designation_id', ['' => '-- Select Designation --'], null, [
        'class' => 'form-control required',
        'id' => 'designation_id',
        'data-placeholder' => 'Select Designation',
    ]) }}



                                </div>

                                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
                                <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

                                <div class="form-group ">
                                    <label class="form-group shadow p-2 mt-2 ">
                                 <h4 class="mt-2 ">Experience</h4></label>
                                </div>

  <!-- repeater -->



  <div class="repeater">
    <div data-repeater-list="group-a">

        <div  data-repeater-item><br>

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('first_name', trans('Total Experience')) !!} <i class="text-danger">*</i>
                        {!! Form::text('totalexp', null, ['class' => 'form-control required', 'placeholder' => 'Total ex[erience]']) !!}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('first_name', trans('Role ')) !!}
                        {!! Form::text('role', null, ['class' => 'form-control', 'placeholder' => 'Role of company']) !!}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('first_name', trans('Company Name')) !!} <i class="text-danger">*</i>
                        {!! Form::text('company_name', null, ['class' => 'form-control required', 'placeholder' => 'Enter Company name']) !!}
                    </div>
                </div>
                 <div class="col-lg-3">
                        <input type="button" data-repeater-delete value="Delete" class="btn btn-md  mt-4  btn btn-outline-danger" />
                </div>

            </div>
            <div class="row mt-1" >
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('first_name', trans('From date')) !!} <i class="text-danger">*</i>
                    {!! Form::date('startdate', null, ['class' => 'form-control required',' max'=>'2025-04-30' , 'placeholder' => 'from date']) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('first_name', trans('End Of Date')) !!} <i class="text-danger">*</i>
                    {!! Form::date('enddate', null, ['class' => 'form-control required',' max'=>'2025-01-15', 'placeholder' => 'end of date']) !!}
                </div>
            </div>
        </div>



        </div>
    </div>
    <input type="button" data-repeater-create value="+ Add" class="btn btn-sm mt-4  btn btn-outline-primary"  />

<div class=" text-center">
    <a href="/country" >
        country
    </a>

    <a href="" >
        Reset
    </a>
    <button name="saveBtn" type="submit" class="btn btn-primary jsSaveEmployee ms-2 saveBtn">
        Save
    </button>
</div>

{!! Form::close() !!}


<script>
    $(document).ready(function () {


        $('.repeater').repeater({
            initEmpty: false,
            defaultValues: {



            },
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },

            ready: function (setIndexes) {



            },
            ready: function (setIndexes) {

    },

    isFirstItemUndeletable: true
        }); });
</script>







        <script>
            $(document).ready(function () {
                $('#departmentid').change(function () {
                    var departmentId = $(this).val();
                    if (departmentId) {
                        $.ajax({
                            url: '/get-designations/' + departmentId,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {

                                $('#designation_id').empty().append('<option value="">-- Select Designation --</option>');
                                $.each(data, function (key, value) {
                                    $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#designation_id').empty().append('<option value="">-- Select Designation --</option>');
                    }
                });
            });
        </script>



<script>


$(document).ready(function() {
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        maxDate: new Date()
    });
 });

 $("#datepicker").change( function() {
    var dob = $(this).datepicker("getDate");

    if (dob) {
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        var monthDiff = today.getMonth() - dob.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        $("#age").val(age);
       // alert("You are " + age + " years old.");
    } else {
        alert("Please select a valid date.");
    }
});






</script>

  <!-- #region

        <script>
$(document).ready(function() {
                $("#departmentid").change(function() {

                    var departmentId = $(this).val();

                    if (departmentId) {
                        $.ajax({
                            url: '/designation',
                            type: 'GET',
                            data: { department_id: departmentId },
                            success: function(data) {
                        S
                                $('#designation_id').empty().append('<option value="">-- Select Designation --</option>');
                                $.each(data, function(id, name) {
                                    $('#designation_id').append('<option value="' + desig_id + '">' + designationname + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#designation_id').empty().append('<option value="">-- Select Designation --</option>');
                    }
                });
            });
            </script>

-->


