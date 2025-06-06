@extends('app');
<body   style="background-color:rgb(218, 231, 231);" >




 <div class="container">
    <div class="d-flex justify-content-center text-secondary">
                <h1> login</h1>

    </div>
        <div class=" d-flex justify-content-center ">
            <div class="col-5 p-4 shadow " >

                @if($errors->any())
                <p style="color: red;">{{ $errors->first() }}</p>
            @endif


                                {!! Form::open(array('url' => 'login')) !!}

                                    <div class="form-group">
                                        {!! Form::label('first_name', trans('Enter your  email')) !!} <i class="text-danger">*</i>
                                        {!! Form::email('email', null, ['class' => 'form-control required', 'placeholder' => 'email']) !!}
                                        @if ($errors->has('email'))
                                        <span class="text-danger">
                                            {{ $errors->first('email') }}
                                        </span>
                                        @endif
                                    </div>



                                    <div class="form-group">
                                        {!! Form::label('first_name', trans('Enter your  enter password')) !!} <i class="text-danger">*</i>
                                        {!! Form::password('password', ['class' => 'form-control required', 'placeholder' => 'password']) !!}
                                        @if ($errors->has('password'))
                                        <span class="text-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                        @endif
                                    </div>


                            <div class=" text-left mt-5">


                                <a href="register" >
                                    Create new Account
                                </a>
                                <button name="saveBtn" type="submit" class="btn btn-primary jsSaveEmployee ms-2 saveBtn">
                                    login
                                </button>
                            </div>
                            {!! Form::close() !!}
             </div>
            </div>
        </div>
