


@include('app')






 <!-- #region
 <div class="container">
    <h1>Countries</h1>


<div> -->
    @include('header')


    <div class="ms-4 mt-4">
        <a href="/salary/create" class="btn btn-md  btn-primary">Add</a></div>

 </div>

   <h4 class="text-center mt-2">Salary Show</h4>
    <div class="container mt-4">


        <table class="table  " id="dataTableBuilder">
            <thead>

                <tr>
                    <th>id</th>
                    <th>Employee Name</th>
                    <th>basic </th>
                    <th>Hra</th>
                    <th>Specialallows </th>
                    <th>overtime </th>
                    <th>totalsary </th>

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
                ajax: '{{ route("salary.index") }}',
                columns: [
                    { data: 'salaryid', name: 'salaryid' ,visible: false },
                    { data: 'employee_fullname', name: 'employee_fullname' },    // 2nd column: Country name
                    // 1st column: ID
                    { data: 'basic', name: 'basic' },
                    { data: 'hra', name: 'hra' },
                    { data: 'specialallows', name: 'specialallows' },
                    { data: 'overtime', name: 'overtime' },
                    { data: 'totalsalary', name: 'totalsalary' },

                    { data: 'action', name: 'action', orderable: false, searchable: false } // 3rd column: Actions
                ]
            });
        }

        $(document).ready(function () {
            loadCountryTable();
        });
        </script>

