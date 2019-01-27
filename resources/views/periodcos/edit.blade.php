@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Periodco
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($periodco, ['route' => ['periodcos.update', $periodco->id], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}

                        @include('periodcos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection