@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Remember
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($remember, ['route' => ['remembers.update', $remember->id], 'method' => 'patch']) !!}

                        @include('remembers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection