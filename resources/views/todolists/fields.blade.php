<!-- User Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Note Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('note_name', 'Note Name:') !!}
    {!! Form::text('note_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Done Field -->
<div class="form-group col-sm-6">
    {!! Form::label('done', 'Done:') !!}
    <label class="checkbox-inline">
      {{--   {!! Form::hidden('done', false) !!}
        {!! Form::checkbox('done', null) !!}  --}}
        {!! Form::checkbox('done', '0', false) !!}
    </label>
</div>

   {{--  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">
    {!! Form::label('admin', 'admin:') !!}</label>
        <div class="col-md-6">
            <label class="checkbox-inline">
                {!! Form::checkbox('admin', '0', false) !!}
            </label>
        </div>
    </div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('todoLists.index') !!}" class="btn btn-default">Cancel</a>
</div>
