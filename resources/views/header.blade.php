

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

   </div> <div class="col-5 mt-2"></div>
   <div class="col-2 mt-2">

   <div class="text-end">
    <i class="bi bi-box-arrow-right text-danger"> </i>   <a href="{{ route('logout') }}" class="btn btn-sm  btn-danger">Logout</a>

</div>
</div>
</div>


