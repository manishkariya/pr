

    <head>

        <title>show data</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
          <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
          <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
          <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
          <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
      </head>
<body>
    <div class="container-fluid">


    <div class="row shadow p-3 bg-secondary">
     <div class="col-2 p-0 ms-4 mt-2">
             <a href="/employee/create" class="btn btn-dark text-white" >Add  employee  </a>
     </div>
     <div class="col-2 mt-2">

     <div class="dropdown">
        <button class="btn  btn-dark text-white  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Action
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/country">country</a></li>
          <li><a class="dropdown-item" href='/state' >state</a></li>

          <li><a class="dropdown-item" href="/cities" >cities</a></li>

          <li><a class="dropdown-item" href="/salary">salary</a></li>

          <li><a class="dropdown-item" href="/departments">department</a></li>

          <li><a class="dropdown-item" href="/designation">designation</a></li>

        </ul>
      </div>
    </div>
    <div class="col-2 mt-2">
        <i class="bi bi-backspace-reverse-fill"></i>     <i class="bi bi-box-arrow-right text-danger"> </i>   <a href="{{ route('logout') }}" class="btn btn-sm  btn-danger">Logout</a>
    </div>
</div><div class="contrainer">
    <div class="mt-4"><table class="table  " id="dataTableBuilder">

            <thead>
                <tr>
                    <th></th>
                    <th><input type="text" placeholder="Search Firstname" style="width:130px; border: 2px solid #579296;padding: 5px 20px;   border-radius: 5px;" /></th>
                    <th><input type="text" placeholder="Search middlename" style="width:130px; border: 2px solid #83b5dd;padding: 5px 20px;   border-radius: 5px;" /></th>
                    <th><input type="text" placeholder="Search lastname" style="width:130px; border: 2px solid #7dbb65;padding: 5px 20px;   border-radius: 5px;" /></th>
                    <th></th>
                    <th></th>
                    <th><input type="text" placeholder="Search department" style="width:130px; border: 2px solid #f09cd7;padding: 5px 20px;   border-radius: 5px;" /></th>
                    <th><input type="text" placeholder="Search designation" style="width:130px; border: 2px solid #ecab7f;padding: 5px 20px;   border-radius: 5px;" /></th>
                    <th</th>
                    <th</th>
                    <th</th>
                    <th</th>
                    <th</th>


                </tr>
                <tr>
                    <th>id</th>
                    <th>Eployee_id</th>

                    <th>firstname</th>
                    <th>middlename</th>
                    <th>lastname</th>
                    <th>birthdate</th>
                    <th>age</th>
                    <th>department</th>
                    <th>designation</th>
                    <th>country</th>
                    <th>state</th>

                    <th>city</th>
                    <th> action</th>

                </tr>
            </thead>

        </table>
    </div>


</body>
</html>



@include('employee.script')


