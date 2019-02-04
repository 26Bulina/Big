<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $todoList->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $todoList->user_id !!}</p>
</div>

<!-- Note Name Field -->
<div class="form-group">
    {!! Form::label('note_name', 'Note Name:') !!}
    <p>{!! $todoList->note_name !!}</p>
</div>

<!-- Done Field -->
<div class="form-group">
    {!! Form::label('done', 'Done:') !!}
    <p>{!! $todoList->done !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $todoList->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $todoList->updated_at !!}</p>
</div>

