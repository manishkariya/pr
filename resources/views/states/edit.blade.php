<div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> Update state</h1>
    </div>
        <div class=" d-flex justify-content-center ">


{!! Form::model($state, ['route' => ['state.update', $state->state_id],'id' => 'stateForm']) !!}
@method('PUT')
{!! Form::hidden ('id', $state->state_id ,['id' => 'id' ])!!}
@include('states.form',[
        'state' => $state
    ])
<button class="btn btn-secondary">update</button>
{!! Form::close() !!}


        </div>

    </div>

