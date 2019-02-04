@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipconcediu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipconcediu, ['route' => ['tipconcedius.update', $tipconcediu->id], 'method' => 'patch']) !!}

                        @include('tipconcedius.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection