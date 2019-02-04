<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('note_name', 'Note Name:') !!}
    {!! Form::text('note_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Done Field -->
<div class="form-group col-sm-6">
    {!! Form::label('done', 'Done:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('done', false) !!}
        {!! Form::checkbox('done', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('todoLists.index') !!}" class="btn btn-default">Cancel</a>
</div>
