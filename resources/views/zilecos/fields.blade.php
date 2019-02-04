<!-- User Id Field --> 
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<!-- Tipconcediu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipconcediu_id', 'Tipconcediu Id:') !!}
    {!! Form::select('tipconcediu_id', $tipconcedius, null, ['class' => 'form-control']) !!}
</div>

<!-- Nr Zile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nr_zile', 'Nr Zile:') !!}
    {!! Form::number('nr_zile', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('zilecos.index') !!}" class="btn btn-default">Cancel</a>
</div>
