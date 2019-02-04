@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Repository
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($repository, ['route' => ['repositories.update', $repository->id], 'method' => 'patch']) !!}

                        @include('repositories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection