<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div> 

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Cnp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnp', 'Cnp:') !!}
    {!! Form::number('cnp', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Personal Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personal_phone', 'Personal Phone:') !!}
    {!! Form::number('personal_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Personal Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personal_email', 'Personal Email:') !!}
    {!! Form::email('personal_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Superior Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('superior_id', 'Superior Id:') !!}
    {!! Form::select('superior_id', $employees, null, ['placeholder' => 'alege superior...','class' => 'form-control']) !!}
</div>

<!-- Job Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job', 'Job:') !!}
    {!! Form::select('job', $jobs, null, ['class' => 'form-control']) !!}
</div>

<!-- admin Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('admin', 'admin:') !!}
        {!! Form::number('admin', null, ['class' => 'form-control']) !!}
    </div>

{{-- <!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo') !!}
</div>
<div class="clearfix"></div> --}}

<!-- Hours Norm Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hours_norm', 'Hours Norm:') !!}
    {!! Form::number('hours_norm', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('employees.index') !!}" class="btn btn-default">Cancel</a>
</div>
