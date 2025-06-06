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

tr:nth-child(even){background-color: #f5f4f4}
</style>




</head>


<body   style="background-color:rgb(252, 252, 252);" >




    <div class="container">


        <div class="d-flex justify-content-center text-secondary">
                <h1> Employee Details</h1>
        </div>
            <div class=" d-flex justify-content-center ">
                <div class="row">
                <div  class="col-2 ">

                    <div class="mt-4 ">
                        <i class="bi bi-play-fill text-primary"></i>  <a href="/country" >  country </a>
                    </div>
                    <div class="mt-2">
                        <i class="bi bi-play-fill text-primary"></i> <a href='/state' >  states </a>
                    </div>
                    <div class="mt-2">
                        <i class="bi bi-play-fill text-primary"></i>   <a href="/cities" >  cities </a>
                    </div>
                    <div class="mt-2">
                        <i class="bi bi-play-fill text-primary"></i>    <a href="/salary/create" >  salary</a>
                    </div>
                    <div class="mt-2">
                        <i class="bi bi-play-fill text-primary"></i>    <a href="/departments" >  Department</a>
                    </div>

                    <div class="mt-2">
                        <i class="bi bi-box-arrow-right text-danger"> </i>   <a href="{{ route('logout') }}">Logout</a>
                    </div>


                </div>



                @if(Session('success'))
                <div class="alert alert-success">
                <span class="text-dark">{{session('success')}}</span>
                </div>
            @endif
                <div class="col-9 p-4 shadow " >


                    {!! Form::open(['route' => 'employee.store','id' => 'employeeForm']) !!}
                    @include('employee.form',[
                    'employee' => null,'designation'=>null
                     ])


   {!! Form::close() !!}


   <div class=" text-center">


    <a href="" >
        Reset
    </a>
    <button name="saveBtn" type="submit" class="btn btn-primary jsSaveEmployee ms-2 saveBtn">
        Save
    </button>
</div>


   @include('employee.script')



   <!-- #region  <script>
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
   </script> -->

           <!-- #region   <script>
               $(document).ready(function () {

               });
           </script>

   <script>


   $(document).ready(function() {

   });


   </script>-->
