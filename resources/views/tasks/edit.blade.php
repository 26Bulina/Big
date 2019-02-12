@extends('layouts.app') 

@section('content')
    <section class="content-header">
        <h1 class="row">
             Task {{ $task->id }}   
          
        </h1>
   </section>
<div class="content">
@include('adminlte-templates::common.errors')
<div class="box box-primary">
<div class="box-body">
<div class="row">
<div class="col-md-4" >
{!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}


<!-- Pers Assign Field -->
<div class="form-group col-lg-10">
    {!! Form::label('pers_assign', 'Pers Assign:') !!}
    {!! Form::select('pers_assign', $users, null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-lg-10">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::select('status_id', $statuses ,null, ['class' => 'form-control']) !!}
</div>

<!-- Priority Id Field -->
<div class="form-group col-lg-10">
    {!! Form::label('priority_id', 'Priority Id:') !!}
    {!! Form::select('priority_id', $priorities, null, ['class' => 'form-control']) !!}
</div>
<!-- departament Id Field -->
<div class="form-group col-lg-10">
    {!! Form::label('departament_id', 'departament Id:') !!}
    {!! Form::select('departament_id', $departaments, null, ['class' => 'form-control']) !!}
</div>

<!-- Repository Id Field -->
<div class="form-group col-lg-10">
    {!! Form::label('repository_id', 'Repository Id:') !!}
    {!! Form::select('repository_id', $repositories, null, ['class' => 'form-control']) !!}
</div>

</div>

{{-- 
<div class="col-md-4" >
  
<h3 align="center"> Adauga watchers</h3>
<form method="POST" id="framework_form" action="">
  <div class="form-group">
    <label > Selecteaza</label>
    <select name="framework[]" id="framework" multiple class="form-control">
      <option value="cod1">cod1</option>
      <option value="cod2">cod2</option>
    </select>
  </div>
</form>
</div> --}}


<!-- Submit Field -->
<div class="form-group col-lg-10">
    {!! Form::submit('Salveaza', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tasks.index') !!}" class="btn btn-default">Anuleaza</a>
</div>


                        {{-- @include('tasks.fieldsx')  --}}

{!! Form::close() !!}
</div>
</div>
</div>
</div>

<script>
  $(document).ready(function(){
      $('#framework').multiselect({
        nonSelectedText: 'Selecteaza framework',
        enableFiltering:true,
        enableCaseInsensitiveFiltering:true,
        buttonWidth: '400px',

      });
      $('#framework_form').on('submit',function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            url: "tasks/edit.blade.php",
            method: "POST",
            data:form_data,
            success:function(data){
              $('#framework option:selected').each(function(){
                $(this).prop('selected',false);
              });
              $('#framework').multiselect('refresh');
              alert(data);
            }
        })

      });
  });
</script>
@endsection