<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Task Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('task_id', 'Task Id:') !!}
    {!! Form::number('task_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Notif Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notif_id', 'Notif Id:') !!}
    {!! Form::number('notif_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Seen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seen', 'Seen:') !!}
    {!! Form::text('seen', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('seens.index') !!}" class="btn btn-default">Cancel</a>
</div>
