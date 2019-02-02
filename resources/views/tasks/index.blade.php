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
            href="{!! route('tasks.create') !!}">Add New</a>
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
<div class="content">
    <div class="clearfix"> <p></p><hr><hr></div>
    @include('flash::message')
    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            @include('tasks.table')
        </div>
    </div>
</div>
@endauth
 @guest
        <div class=" row justify-content-center col-md-offset-2 col-md-6">
            <h3>    Pentru a vedea aceasta pagina trebuie sa va autentificati. </h3>
        </div>
 @endguest
@endsection