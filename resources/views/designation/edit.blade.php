<div class="container">
    <div class="d-flex justify-content-center text-dark">
                <h1> Update Designation</h1>
    </div>

        <div class=" d-flex justify-content-center ">

            <div class="col-6 shadow p-4">


{!! Form::model($designation, ['route' => ['designation.update', $designation->desig_id],'id' => 'designationForm']) !!}
@method('PUT')
{!! Form::hidden ('id', $designation->design_id ,['id' => 'id' ])!!}
@include('designation.form',[
        'designation' => $designation
    ])
<button class="btn btn-secondary mt-4">update</button>
{!! Form::close() !!}


        </div>
    </div>
    </div>

