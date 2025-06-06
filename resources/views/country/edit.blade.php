<div class="container">
    <div class="d-flex justify-content-center text-dark">
                <h1> Update Country</h1>
    </div>
        <div class=" d-flex justify-content-center ">


{!! Form::model($country, ['route' => ['country.update', $country->cid],'id' => 'countryForm']) !!}
@method('PUT')
{!! Form::hidden ('id', $country->cid ,['id' => 'id' ])!!}
@include('country.form',[
        'country' => $country
    ])
<button class="btn btn-secondary">update</button>
{!! Form::close() !!}


        </div>

    </div>

