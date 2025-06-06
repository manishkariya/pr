



@include('app')


<!-- jQuery -->





 <!-- #region
 <div class="container">
    <h1>Countries</h1>
 !!$ dataTable->table() !!}
    !! $ dataTable->scripts() !!}

<div> -->
@include('header')
    <div class="container col-6 mt-4">

        <div class="  p-3">
            <div class="ms-4">
                <a href="/country/create" class="btn btn-md  btn-primary">Add</a></div>

         </div></div>

 <table class="table  " id="dataTableBuilder">
    <thead>

        <tr>
            <th>id</th>
            <th>countryname</th>

            <th> action</th>

        </tr>
    </thead>
    <tbody>
    </tbody>

</table>
</div>

<script>
    function loadCountryTable() {
        if ($.fn.DataTable.isDataTable('#dataTableBuilder')) {
            $('#dataTableBuilder').DataTable().clear().destroy();
        }

        $('#dataTableBuilder').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("country.index") }}',
            columns: [
                { data: 'cid', name: 'cid' ,visible: false },                      // 1st column: ID
                { data: 'countryname', name: 'countryname' },    // 2nd column: Country name
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
        let status = $(this).is(':checked') ? 'yes' : 'no';
        console.log(cid)
      console.log(status);
        $.ajax({
            url: '/countries/' + cid + '/toggle-status',
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












<script>
$(document).ready(function() {
    $('.status-switch').change(function() {
        let cid = $(this).data('user-id');
        let status = $(this).is(':checked') ? 'yes' : 'no';
      console.log(status);
        $.ajax({
            url: '/countries/' + cid + '/toggle-status',
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











