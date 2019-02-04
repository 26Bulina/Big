@extends('layouts.app')
@section('content')
@auth
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Tasks</h1>
            
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col-md-4">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
            href="{!! route('tasks.create') !!}">Add New task</a>
        </div>
        <div class="col-md-1">
            <form method="GET" action="/csv ">  {{csrf_field()}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> exporta csv</button>
                </div>
            </form>
         </div>
        <div class="col-md-4">
            <form action="{{ route('tasks.index') }}" method="get" class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" name="s" placeholder="keyword" value="{{ isset($s) ? $s : '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" > search </button>
                </div>
            </form>
        </div>
    </div>
</div>


@yield('task')



@endauth
 @guest
        <div class=" row justify-content-center col-md-offset-2 col-md-6">
            <h3>    Pentru a vedea aceasta pagina trebuie sa va autentificati. </h3>
        </div>
 @endguest
@endsection