<!-- Subject Field --> 
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Pers Create Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('pers_create', 'Pers Create:') !!}
    {!! Form::select('pers_create',$users, null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Pers Assign Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pers_assign', 'Pers Assign:') !!}
    {!! Form::select('pers_assign', $users, null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::select('status_id', $statuses ,null, ['class' => 'form-control']) !!}
</div>

<!-- Priority Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priority_id', 'Priority Id:') !!}
    {!! Form::select('priority_id', $priorities, null, ['class' => 'form-control']) !!}
</div>
<!-- departament Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departament_id', 'departament Id:') !!}
    {!! Form::select('departament_id', $departaments, null, ['class' => 'form-control']) !!}
</div>

<!-- Repository Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repository_id', 'Repository Id:') !!}
    {!! Form::select('repository_id', $repositories, null, ['class' => 'form-control']) !!}
</div>


<!-- Fisier Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('fisier', 'Fisier/attach:') !!}
    {!! Form::file('fisier') !!}
</div>
<div class="clearfix"></div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tasks.index') !!}" class="btn btn-default">Cancel</a>
</div>
