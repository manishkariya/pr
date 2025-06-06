

@extends('app')
@include('header')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"></meta>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<head>
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    </script>

</head>
<div class=" ms-4 p-3">
    <div class="ms-4">
        <a href="/state/create" class="btn btn-md  btn-primary">Add</a></div>

 </div></div>






 <div class="container">


    <table class="table  " id="dataTableBuilder">

        <thead>
            <tr>
                <th></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search Country" /></th>
                <th><input type="text" class="form-control form-control-sm" placeholder="Search State" /></th>
                <th></th> <!-- No input for action column -->
            </tr>
            <tr>
                <th>State ID</th>
                <th>Country Name</th>
                <th>State Name</th>
                <th>Action</th>
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

        table = $('#dataTableBuilder').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("state.index") }}',
            columns: [
                { data: 'state_id', name: 'state_id',  },
                { data: 'country_name', name: 'country_name' },
                { data: 'statename', name: 'statename' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
        $('#dataTableBuilder thead tr:eq(0) th').each(function (i) {
            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });
    }


    $(document).ready(function () {
        loadCountryTable();
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('change', '.status-switch', function () {
            let state_id = $(this).data('id');


            let status = $(this).is(':checked') ? 'yes' : 'no';
          console.log(status);
            $.ajax({
                url: '/state/' + state_id + '/toggle-status',
                type: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('Status updated successfully');
                },
                error: function() {
                    alert('Failed to update status');
                }
            });
        });
    });
    </script>
















