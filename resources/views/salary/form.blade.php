{!! Form::label('employeename', trans(' select  name ')) !!}<i class="text-danger">*</i>
{{ Form::select('employee_id', ['' => '-- Select Name --']+$employeename ,null , [
    'class' => 'form-control required '  . ($errors->has('employee_id') ? 'is-invalid' : ''),
    'id' => 'departmentid',
    'data-placeholder' => 'Select country',
]) }}

<div class="form-group">
    {!! Form::label('salary', trans('Total salary')) !!} <i class="text-danger">*</i>
    {!! Form::number('totalsalary', null, [
        'class' => 'form-control w-50 required' ,
        'readonly' => 'readonly',
        'id' => 'totalSalary',
        'placeholder' => 'total amount',
    ]) !!}
</div>

<div class="form-group">
    {{ Form::label(__('salary.basic'), trans('Basic')) }}<i class="text-danger">*</i>
    {{ Form::number('basic', null, [ 'class' => 'form-control required ' . ($errors->has('basic') ? 'is-invalid' : '')
 , 'id' => 'basic']) }}
</div>



<div class="form-group">
    {{ Form::label(__('salary.hra'), trans('HRA')) }}<i class="text-danger">*</i>
    {{ Form::number('hra', null, ['class' => 'form-control required '. ($errors->has('hra') ? 'is-invalid' : ''), 'id' => 'hra']) }}
</div>

<div class="form-group">
    {{ Form::label(__('salary.overtime'), trans('Overtime In Hours')) }}<i class="text-danger">*</i>
    {{ Form::number('overtime', null, ['class' => 'form-control required ' . ($errors->has('overtime') ? 'is-invalid' : ''), 'id' => 'overtime']) }}
</div>

<div class="form-group">
    {{ Form::label(__('salary.sum'), trans('Total Salary')) }}<i class="text-danger">*</i>
    {{ Form::text('totalsalary', null, ['class' => 'form-control', 'readonly' => 'readonly', 'id' => 'total1Salary']) }}
</div>

