@extends('layouts.app') 

@section('content')
    <section class="content-header">
        <h1>
            Task
        </h1>
    </section>


{{-- {{ $pers_co }}
        @foreach($nr_task as $task)
        <tr>
            <td>{!! $task->pers_assign !!}</td>
            <td>{!! $task->t_dep !!}</td>
            <td>{!! $task->nr_tsk !!}</td>
        </tr>
        <hr>
        @endforeach  --}}

      {{--   @foreach($pers_per_dep as $pers)
        <hr>
        <tr>
            <td>{!! $pers->user !!}</td>
            <td>{!! $pers->dep !!}</td>
        </tr>
        <hr>
        @endforeach  --}}


    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'tasks.store','enctype' => 'multipart/form-data']) !!}

                        @include('tasks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
