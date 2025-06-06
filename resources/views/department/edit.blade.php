<div class="container">
    <div class="d-flex justify-content-center text-dark">
                <h1> Update Department</h1>
    </div>

        <div class=" d-flex justify-content-center ">

            <div class="col-6 shadow p-4">






{!! Form::model($department, ['route' => ['departments.update', $department->depart_id],'id' => 'departmentForm']) !!}
@method('PUT')
{!! Form::hidden ('id', $department->depart_id ,['id' => 'id' ])!!}
@include('department.form',[
        'department' => $department
    ])
<button class="btn btn-secondary mt-4">update</button>
{!! Form::close() !!}


        </div>
    </div>
    </div>

