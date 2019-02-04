@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Todo List
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($todoList, ['route' => ['todoLists.update', $todoList->id], 'method' => 'patch']) !!}

                        @include('todolists.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection