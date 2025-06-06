
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        {!! Form::label('firstname', trans('employee.firstname')) !!} <i class="text-danger">*</i>
                                        {!! Form::text('firstname', null, ['class' => 'form-control required ' . ($errors->has('firstname') ? 'is-invalid' : ''), 'placeholder' => 'First Name']) !!}
                                        @if ($errors->has('firstname'))
                                        <span class="text-danger">
                                            {{ $errors->first('firstname') }}
                                        </span>
                                    @endif
                                    </div>

                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('firstname', trans('employee.middlename')) !!}
                                            {!! Form::text('middlename', null, ['class' => 'form-control required ' . ($errors->has('middlename') ? 'is-invalid' : ''), 'placeholder' => 'Middle Name']) !!}
                                            @if ($errors->has('middlename'))
                                            <span class="text-danger">
                                                {{ $errors->first('middlename') }}
                                            </span>
                                        @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        {!! Form::label('', trans('employee.lastname')) !!} <i class="text-danger">*</i>
                                        {!! Form::text('lastname', null, ['class' => 'form-control required '. ($errors->has('lastname') ? 'is-invalid' : '') , 'placeholder' => 'Last Name' ]) !!}
                                        @if ($errors->has('lastname'))
                                        <span class="text-danger">
                                            {{ $errors->first('lastname') }}
                                        </span>
                                    @endif
                                    </div>
                                 </div>
                            </div>




                               <div class="row">
                                <div class="col-lg-4">

                                    <div class="form-group">
                                        {!! Form::label('birth_date', trans('employee.date_of_birth')) !!} <i class="text-danger">*</i>
                                        {!! Form::text('birthdate', null, ['class' => 'form-control required '. ($errors->has('birthdate')? 'is-invalid' : '')  ,'id'=>'datepicker',($errors->has('birthdate') ? 'is-invalid' : '') , 'placeholder' => 'dd/mm/yyyy']) !!}
                                        @if ($errors->has('birthdate'))
                                        <span class="text-danger">
                                            {{ $errors->first('birthdate') }}
                                        </span>
                                    @endif
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('age', trans('employee.age_years')) !!} <i class="text-danger">*</i>
                                            {!! Form::number('age', null, [
                                                'class' => 'form-control required '. ($errors->has('age')? 'is-invalid' : ''),
                                                'readonly' => 'readonly',
                                                'id' => 'age',
                                                'placeholder' => 'Age',
                                            ]) !!}
                                                @if ($errors->has('age'))
                                                <span class="text-danger">
                                                    {{ $errors->first('age') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                <div class="form-group col-lg-4">




        {!! Form::label('employee.department', trans('employee.department')) !!}<i class="text-danger">*</i>
        {{ Form::select('department', ['' => '-- Select Department --'] + $department,null , [
            'class' => 'form-control required '. ($errors->has('department')? 'is-invalid' : ''),
            'id' => 'departmentid',
            'data-placeholder' => 'Select Branch',


        ]) }}

@if ($errors->has('department'))
<span class="text-danger">
    {{ $errors->first('department') }}
</span>
@endif
</div>
<div class="form-group col-lg-4">
        {!! Form::label('employee.designation', trans('Designation')) !!}<i class="text-danger">*</i>
        {{ Form::select('designation', ['' => '-- Select Designation --']+$desig, null,  [
            'class' => 'form-control required '. ($errors->has('designation')? 'is-invalid' : ''),
            'id' => 'designation_id',
            'data-placeholder' => 'Select Designation',
        ]) }}
    @if ($errors->has('designation'))
    <span class="text-danger">
        {{ $errors->first('designation') }}
    </span>
@endif
</div>
</div>


<div class="row">
    <div class="col-lg-4">

        <div class="form-group">

{!! Form::label('employee.country', trans('country')) !!}<i class="text-danger">*</i>
{{ Form::select('country', ['' => '-- Select Country --'] +$country, null, [
    'class' => 'form-control required '. ($errors->has('country')? 'is-invalid' : ''),
    'id' => 'country_id',
    'data-placeholder' => 'Select Designation',
]) }}
@if ($errors->has('country'))
<span class="text-danger">
{{ $errors->first('country') }}
</span>
@endif
        </div>
    </div>

    <div class="col-lg-4">

        <div class="form-group">

{!! Form::label('employee.state', trans('state')) !!}<i class="text-danger">*</i>
{{ Form::select('state', ['' => '-- Select state --']+$state, null, [
    'class' => 'form-control required '. ($errors->has('state')? 'is-invalid' : ''),
    'id' => 'state_id','readonly ',
    'data-placeholder' => 'Select Designation',
]) }}
@if ($errors->has('state'))
<span class="text-danger">
{{ $errors->first('state') }}
</span>
@endif

</div></div>
<div class="col-lg-4">

    <div class="form-group">
{!! Form::label('employee.city', trans('city')) !!}<i class="text-danger">*</i>
{{ Form::select('city', ['' => '-- Select city --']+$city , null, [
    'class' => 'form-control required '. ($errors->has('city')? 'is-invalid' : ''),
    'id' => 'city_id', 'readonly ',
    'data-placeholder' => 'Select Designation',
]) }}
@if ($errors->has('city'))
<span class="text-danger">
{{ $errors->first('city') }}
</span>
@endif
</div></div>

                                </div>

                                   <div class="form-group ">
                                       <label class="form-group text-secondary shadow p-2 mt-2 ">
                                    <h5 class="mt-2 ">Experience</h5></label>
                                   </div>




     <div class="repeater">

       <div data-repeater-list="group-a">

        <br>

<!-- repeater -->


        @if(isset($designation) && sizeof($designation) > 0)


            @foreach($designation as $designation1=>$value)
            <div  data-repeater-item>
            <div class="row">
                <div class="col-lg-3">
                    {!! Form::hidden('Ex_id', $value['Ex_id'] ?? null, ['class' => 'po-item-id-cls']) !!}
                    {!! Form::hidden('empid', $value['empid']?? null, ['class' => 'unit-id-cls']) !!}

                    <div class="form-group">

                        {!! Form::label('first_name', trans('Total Experience')) !!} <i class="text-danger">*</i>
                        {!! Form::text('totalexperience', $value['totalexperience'], ['class' => 'form-control required' , 'placeholder' => 'Total experince']) !!}

                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('first_name', trans('Role ')) !!}
                        {!! Form::text('role', $value['role'], [ 'class' => 'form-control', 'placeholder' => 'Role of company']) !!}
                        @if ($errors->has('role'))
                        <span class="text-danger">
                        {{ $errors->first('role') }}
                        </span>
                        @endif
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::label('first_name', trans('Company Name')) !!} <i class="text-danger">*</i>
                        {!! Form::text('company_name',  $value['company_name']?? '', ['class' => 'form-control required', 'placeholder' => 'Enter Company name']) !!}
                    </div>
                </div>


            </div>
            <div class="row mt-1" >
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('first_name', trans('From date')) !!} <i class="text-danger">*</i>
                    {!! Form::date('start_date', $value['start_date']?? '' ,  ['class' => ' form-control required ','max'=>'2025-05-29' , 'placeholder' => 'from date']) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('first_name', trans('End Of Date')) !!} <i class="text-danger">*</i>
                    {!! Form::date('end_date',  $value['end_date']?? '' , ['class' => 'form-control required ',' max'=>'2025-05-30', 'placeholder' => 'end of date']) !!}
                </div>


            </div>
            <div class="col-lg-3 ">
                <input type="button" data-repeater-delete value="Delete" class="btn btn-md  mt-4  btn btn-outline-danger" />
        </div>
        <p><p>
        </div>

           </div>


        @endforeach
        </div>
        @else

        <div  data-repeater-item>

               <div class="row">
                   <div class="col-lg-3">
                       <div class="form-group">
                           {!! Form::label('totalexperience', trans('Total Experience')) !!} <i class="text-danger">*</i>
                           {!! Form::text('totalexperience', null, ['class' => 'form-control  required '. ($errors->has('group-a.*.totalexperience') ? 'is-invalid' : ''), 'placeholder' => 'Total experience',' required'=>true ]) !!}
                           @if ($errors->has('totalexperience'))
                           <span class="text-danger">
                               {{ $errors->first('totalexperience') }}
                           </span>
                       @endif
                        </div>


                   </div>
                   <div class="col-lg-3">
                       <div class="form-group">
                           {!! Form::label('role', trans('Role ')) !!}
                           {!! Form::text('role', null, ['class' => 'form-control required '. ($errors->has('group-a.*.role') ? 'is-invalid' : ''), 'placeholder' => 'Role of company','required'=>true]) !!}
                           @if ($errors->has('role'))
                           <span class="text-danger">
                               {{ $errors->first('role') }}
                           </span>
                       @endif
                        </div>
                   </div>
                   <div class="col-lg-3">
                       <div class="form-group">
                           {!! Form::label('company_name', trans('Company Name')) !!} <i class="text-danger">*</i>
                           {!! Form::text('company_name', null, ['class' => 'form-control required '. ($errors->has('group-a.*.company_name') ? 'is-invalid' : ''), 'placeholder' => 'Enter Company name','required'=>true]) !!}
                           @if ($errors->has('company_name'))
                           <span class="text-danger">
                               {{ $errors->first('company_name') }}
                           </span>
                       @endif
                        </div>

                   </div>
                    <div class="col-lg-3">
                           <input type="button" data-repeater-delete value="Delete" class="btn btn-md  mt-4  btn btn-outline-danger" />
                   </div>


               </div>
               <div class="row mt-1" >
               <div class="col-lg-3">
                   <div class="form-group">
                       {!! Form::label('first_name', trans('From date')) !!} <i class="text-danger">*</i>
                       {!! Form::date('start_date', null, ['class' => 'form-control required '. ($errors->has('group-a.*.start_date') ? 'is-invalid' : ''),' max'=>'2025-04-30' , 'placeholder' => 'from date','required'=>true]) !!}
                       @if ($errors->has('start_date'))
                       <span class="text-danger">
                           {{ $errors->first('start_date') }}
                       </span>
                   @endif
                    </div>
               </div>
               <div class="col-lg-3">
                   <div class="form-group">
                       {!! Form::label('first_name', trans('End Of Date')) !!} <i class="text-danger">*</i>
                       {!! Form::date('end_date', null, ['class' => 'form-control required '. ($errors->has('group-a.*.end_date') ? 'is-invalid' : ''),' max'=>'2025-05-25', 'placeholder' => 'end of date','required'=>true]) !!}
                       @if ($errors->has('end_date'))
                       <span class="text-danger">
                           {{ $errors->first('end_date') }}
                       </span>
                   @endif
                    </div>
               </div>
               <p><p>
           </div>



           </div>
       </div>   @endif
       <input type="button" data-repeater-create value="+ Add" class="btn btn-sm mt-4  btn btn-outline-primary"  />
