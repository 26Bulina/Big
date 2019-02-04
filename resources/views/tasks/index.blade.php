@extends('tasks.t')
@section('task')


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

@endsection