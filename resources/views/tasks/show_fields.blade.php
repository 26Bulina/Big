<!-- Id Field --> 
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $task->id !!}</p>
</div>

<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{!! $task->subject !!}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{!! $task->body !!}</p>
</div>

<!-- Pers Create Field -->
<div class="form-group">
    {!! Form::label('pers_create', 'Pers Create:') !!}
    <p>{!! $task->pers_create !!}</p>
</div>

<!-- Pers Assign Field -->
<div class="form-group">
    {!! Form::label('pers_assign', 'Pers Assign:') !!}
    <p>{!! $task->pers_assign !!}</p>
</div>

<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{!! $task->status_id !!}</p>
</div>

<!-- Priority Id Field -->
<div class="form-group">
    {!! Form::label('priority_id', 'Priority Id:') !!}
    <p>{!! $task->priority_id !!}</p>
</div>

<!-- Repository Id Field -->
<div class="form-group">
    {!! Form::label('repository_id', 'Repository Id:') !!}
    <p>{!! $task->repository_id !!}</p>
</div>

<!-- Fisier Field -->
<div class="form-group">
    {!! Form::label('fisier', 'Fisier/attach:') !!}
    <p>{!! $task->fisier !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $task->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $task->updated_at !!}</p>
</div>

