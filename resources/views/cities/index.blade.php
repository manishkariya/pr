

@include('app')
@include('header')
<div class="ms-4 mt-4">
    <a href="/cities/create" class="btn btn-md  btn-primary">Add</a></div>

</div>
<div class="container mt-4">

<table class="table  " id="dataTableBuilder">
    <thead>

        <tr>
            <th>id</th>
            <th>country Name</th>
            <th>State Name</th>
            <th>City Name</th>

            <th> action</th>

        </tr>
    </thead>
    <tbody>
    </tbody>

</table>
</div><div>

<script>
    function loadCountryTable() {
        if ($.fn.DataTable.isDataTable('#dataTableBuilder')) {
            $('#dataTableBuilder').DataTable().clear().destroy();
        }

        $('#dataTableBuilder').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("cities.index") }}',
            columns: [
                { data: 'cityid', name: 'cityid' ,visible: false },                      // 1st column: ID
                { data: 'country_name', name: 'country_name' },
                { data: 'state_name', name: 'state_name' },
                { data: 'cityname', name: 'cityname' },
                { data: 'action', name: 'action', orderable: false, searchable: false } // 3rd column: Actions
            ]
        });
    }

    $(document).ready(function () {
        loadCountryTable();
    });
    </script>



<script>
    $(document).ready(function() {
        $(document).on('change', '.status-switch', function () {
            let cid = $(this).data('id');

            console.log(cid);
            let status = $(this).is(':checked') ? 'yes' : 'no';
          console.log(status);
            $.ajax({
                url: '/city/' + cid + '/toggle-status',
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









