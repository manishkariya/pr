
@extends('app')
<div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> Add cities </h1>
    </div>
        <div class=" d-flex justify-content-center ">
            <div class="col-9 p-4 shadow " >

{!! Form::open(['route' => 'cities.store','id' => 'citiesForm']) !!}
@include('cities.form',[
        'cities' => null
    ])

<div  class="text-center">
    <button  class="btn btn-md btn-primary " id="btn_loader">submit</button>
<div>
{!! Form::close() !!}

<script>
    $(document).ready(function () {

$('#country_id').change(function () {
    var countryId = $(this).val();
    if (countryId) {
        $.ajax({
            url: '/get-state/' + countryId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

             $('#state_id').prop('disabled', false);


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
