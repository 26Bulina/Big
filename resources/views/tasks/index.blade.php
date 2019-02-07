@extends('tasks.t')
@section('task')




        <table class="table table-responsive" id="tasks-table">
        <tbody>
            @foreach($departamentes as $dep)
            
            <a class="padd list-group-item" href="{{ route('departament',$dep->id) }} " >
             {{ $dep->name}}
                <span class="badge pull-right badge-primary" style="background: #D67FFFFF; 
                      position:relative;"> {{ $dep->tasks->count() }}</span>
            </a>
              
            @endforeach
        </tbody>
        </table>









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