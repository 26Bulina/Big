@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Empl
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($empl, ['route' => ['empls.update', $empl->id], 'method' => 'patch']) !!}

                        @include('empls.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection