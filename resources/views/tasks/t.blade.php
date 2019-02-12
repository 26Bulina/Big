@extends('layouts.app')
@section('content')
@auth
<div class="container">
    <div class="row justify-content-around">
        <div class="col-md-3">
        <table class="table table-responsive" id="tasks-table">
        <tbody>
            @foreach($departamentes as $dep)
            <div>
            {{-- <a class="padd list-group-item" href="{{ route('departament',$dep->id) }} " > --}}
            <h1> {{ $dep->name}} Tasks 
                <span class="badge pull-right badge-primary" style="background: #316BCDFF; 
                      position:relative;"> {{ $dep->tasks->count() }}</span> </h1>
            {{-- </a> --}}
              </div>
            @endforeach
              </tbody>
        </table>
        </div>

        <div class="col-md-2">
            <a class="btn btn-primary pull-right" style="margin-top: 10px;margin-bottom: -10px"
            href="{!! route('tasks.create') !!}">Add New task</a>
        </div>
        <div class="col-md-2" style="margin-top: 10px;margin-bottom: -10px">
            <form method="GET" action="/csv ">  {{csrf_field()}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> exporta csv</button>
                </div>
            </form>
         </div>
        <div class="col-md-4" style="margin-top: 10px;margin-bottom: -10px">
            <form action="{{ route('tasks.index') }}" method="get" class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" name="s" placeholder="keyword" value="{{ isset($s) ? $s : '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" > search </button>
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