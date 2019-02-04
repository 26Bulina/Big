@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Watcher
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($watcher, ['route' => ['watchers.update', $watcher->id], 'method' => 'patch']) !!}

                        @include('watchers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection