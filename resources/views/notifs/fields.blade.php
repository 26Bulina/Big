<!-- User Id Field -->
<div class="form-group col-sm-6">
{{--     {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!} --}}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Modif App Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modif_app', 'Modif App:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('modif_app', false) !!}
        {!! Form::checkbox('modif_app', '1', null) !!} 
    </label>
</div>

<!-- Happy Team Field -->
<div class="form-group col-sm-6">
    {!! Form::label('happy_team', 'Happy Team:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('happy_team', false) !!}
        {!! Form::checkbox('happy_team', '1', null) !!} 
    </label>
</div>

<!-- Work Team Field -->
<div class="form-group col-sm-6">
    {!! Form::label('work_team', 'Work Team:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('work_team', false) !!}
        {!! Form::checkbox('work_team', '1', null) !!} 
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('notifs.index') !!}" class="btn btn-default">Cancel</a>
</div>
