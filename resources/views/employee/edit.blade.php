
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>



    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>My first app in core php</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <!-- datatable call -cdn-->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Load jQuery Repeater Plugin (only once) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<!-- Include jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<!-- Include Repeater Plugin -->
<script src="https://cdn.jsdelivr.net/npm/jquery.repeater@1.2.1/jquery.repeater.min.js"></script>

 <!-- cdn date picker-->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


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

tr:nth-child(even){background-color: #fcf7f7}
</style>




</head>


<body   style="background-color:rgb(255, 255, 255);" >


    <style>
        .underline-animation {
            display: inline-block;
            position: relative;
            font-size: 48px;
        }

        .underline-animation::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 3px;
            background-color: #881149;
            animation: underline 2s ease-in-out infinite;
        }

        @keyframes underline {
            0% {
                width: 0;
            }
            50% {
                width: 100%;
            }
            100% {
                width: 0;
            }
        }
    </style>


    <div class="container">


        <div class="d-flex justify-content-center text-secondary">
            <h1 class="underline-animation"> EDIT  Employee Details</h1>


        </div>
            <div class=" d-flex justify-content-center p-4  shadow border border-1 border-secondary ">

                <div class="row">

                <div  class="col-2 ">




                </div>

 {!! Form::model($employee, ['route' => ['employee.update', $employee->id],'id' => 'employeeForm']) !!}

 @method('PUT')
{!! Form::hidden ('id', $employee->id ,['id' => 'id' ])!!}

@include('employee.form',[
        'employee' => $employee,'desiganation'=>$designation
    ])
<div class=" text-center">
    <button class="btn btn-secondary">update</button>
</div>
{!! Form::close() !!}


        </div>

    </div>

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
            });

      //department fetch

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



                       $('#country_id').change('onclick',function () {
                       var countryId = $(this).val();
                       if (countryId) {
                           $.ajax({
                               url: '/get-state/' + countryId,
                               type: 'GET',
                               dataType: 'json',
                               success: function (data) {


                                $('#state_id').prop('disabled', false); // Enable the state dropdown
                                $('#city_id').prop('disabled', true);
                                $('#state_id').empty().append('<option value="">-- Select state --</option>');
                                $('#city_id').empty().append('<option value="">-- Select city --</option>');

                                $.each(data, function (key, value) {
                                       $('#state_id').append('<option value="' + key + '">' + value + '</option>');
                                   });
                               }
                           });
                       } else {
                           $('#state_id').empty().append('<option value="">-- Select state --</option>');
                       }
                   });
                   $('#state_id').change(function () {
                       var stateId = $(this).val();
                       if (stateId) {
                           $.ajax({
                               url: '/get-city/' + stateId,
                               type: 'GET',
                               dataType: 'json',
                               success: function (data) {
                                $('#city_id').prop('disabled', false);

                                   $('#city_id').empty().append('<option value="">-- Select Designation --</option>');
                                   $.each(data, function (key, value) {
                                       $('#city_id').append('<option value="' + key + '">' + value + '</option>');
                                   });
                               }
                           });
                       } else {
                           $('#city_id').empty().append('<option value="">-- Select city --</option>');
                       }
                   });


     //end
    // auto age fetch
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