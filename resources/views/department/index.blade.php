

@include('app')
@include('header')
<div class="d-flex justify-content-center text-secondary">


    </div>

    <div class=" ms-4 p-3">
        <div class="ms-4">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle mt-1  mb-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Add
                </button>
                <ul class="dropdown-menu">


                  <li><a class="dropdown-item" href="/departments/create">Add Department</a></li>



                  <li><a class="dropdown-item" href="{{route('designation.create')}}">Add Designation</a></li>
                </ul>
              </div>

     </div></div>




     <h4 class="text-center mt-2">Department</h4>
     <div class="container mt-4">


         <table class="table  " id="dataTableBuilder">
             <thead>

                 <tr>
                     <th>id</th>
                     <th>Department Name Name</th>


                     <th> action</th>

                 </tr>
             </thead>
             <tbody>
             </tbody>

         </table>


     </table>

     <script>
         function loadCountryTable() {
             if ($.fn.DataTable.isDataTable('#dataTableBuilder')) {
                 $('#dataTableBuilder').DataTable().clear().destroy();
             }

             $('#dataTableBuilder').DataTable({
                 processing: true,
                 serverSide: true,

                 "lengthMenu": [[ 5,10 , 25, 100 ], [ 5, 15, 25, 100]],
                 ajax: '{{ route("departments.index") }}',
                 columns: [
                     { data: 'depart_id', name: 'depart_id' ,visible: false },
                     { data: 'departmentname', name: 'departmentname' },    // 2nd column: Country name
                     // 1st column: ID

                     { data: 'action', name: 'action', orderable: false, searchable: false } // 3rd column: Actions
                 ]
             });
         }

         $(document).ready(function () {
             loadCountryTable();
         });
         </script>
















