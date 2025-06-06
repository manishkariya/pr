<div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> Update Cities</h1>
    </div>
        <div class=" d-flex justify-content-center ">


{!! Form::model($city, ['route' => ['cities.update', $city->cityid],'id' => 'citiesForm']) !!}
@method('PUT')
{!! Form::hidden ('id', $city->cityid ,['id' => 'id' ])!!}
@include('cities.form',[
        'cities' => $city
    ])
<button class="btn btn-secondary">update</button>
{!! Form::close() !!}


        </div>

    </div>

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
