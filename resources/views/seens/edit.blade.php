@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Seen
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($seen, ['route' => ['seens.update', $seen->id], 'method' => 'patch']) !!}

                        @include('seens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection