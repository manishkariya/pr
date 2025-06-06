@extends('app')

<body   style="background-color:rgb(239, 250, 250);" >




 <div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> Create Account Here</h1>
    </div>
        <div class=" d-flex justify-content-center ">
            <div class="col-6 p-4 shadow " >
                <div class=" d-flex justify-content-center ">

                                {!! Form::open(array('url' => 'addregister')) !!}
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            {!! Form::label('first_name', trans('Enter your firstname')) !!} <i class="text-danger">*</i>
                                            {!! Form::text('firstname',null, ['class' => 'form-control required', 'placeholder' => 'Enter firstname']) !!}
                                            @if ($errors->has('firstname'))
                                            <span class="text-danger">
                                                {{ $errors->first('firstname') }}
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            {!! Form::label('first_name', trans('Enter your lastname')) !!} <i class="text-danger">*</i>
                                            {!! Form::text('lastname',null, ['class' => 'form-control required', 'placeholder' => 'Enter lastname']) !!}
                                            @if ($errors->has('lastname'))
                                            <span class="text-danger">
                                                {{ $errors->first('lastname') }}
                                            </span>
                                            @endif
                                        </div>


                                    <div class="form-group">
                                        {!! Form::label('first_name', trans('Enter your  email')) !!} <i class="text-danger">*</i>
                                        {!! Form::email('email', null, ['class' => 'form-control required', 'placeholder' => 'Enter email']) !!}
                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                {{ $errors->first('email') }}
                                            </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        {!! Form::label('first_name', trans('Enter your  password')) !!} <i class="text-danger">*</i>
                                        {!! Form::password('password',null, ['class' => 'form-control required', 'placeholder' => 'Enter password']) !!}
                                        @if ($errors->has('password'))
                                        <span class="text-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            <div class=" text-left  mt-4">

                                <button name="saveBtn" type="reset" class="btn btn-primary ">
                                    Reset
                                </button>

                                <button name="saveBtn" type="submit" class="btn btn-primary jsSaveEmployee ms-2 saveBtn">
                                    register
                                </button>
                            </div>

             </div>
            </div>     {!! Form::close() !!}
        </div></div>
