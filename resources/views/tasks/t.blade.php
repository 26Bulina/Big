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
            <h1>  Tasks 
                {{-- <span class="badge pull-right badge-primary" style="background: #316BCDFF; position:relative;"> {{ $dep->tasks->count() }}</span> </h1> --}}
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














  

    <table class="table table-responsive" id="tasks-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Pers Create</th>
            <th>Subject</th>
            <th>Pers Assign</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Repository</th>
            <th>Departament</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
 <h3> Task-uri asignate mie:</h3>

 @foreach($tasks_assigned as $task)

    <tbody>
        <tr><td>
                        <a href="{!! route('tasks.show', [$task->id]) !!}" ><i >
                            <code>{!! $task->id !!}</code></i></a>
                        </td>
                        <td><a href="{!! route('informatii', [$task->pers_create]) !!}"><code>
                          {!! $task->p_create->name !!}</code></a></td>
                        <td>
                        <a href="{!! route('tasks.show', [$task->id]) !!}" ><i >
                            <code>{!! $task->subject !!}</code></i></a>
                        </td>
                        <td><a href="{!! route('informatii', [$task->pers_assign]) !!}"><code>
                          {!! $task->p_assign->name !!}</code></a></td>
                        <td>{!! $task->status->name or ' ' !!}</td>
                        <td>{!! $task->priority->name or ' ' !!}</td>
                        <td>{!! $task->repository->name or ' ' !!}</td>
                        <td>{!! $task->departament['name'] !!}</td>
                        {{-- <td> <img src="{!! $task->fisier  !!}" alt="{!! $task->fisier  !!}"
                            class="img-responsive" width="150" height="150"></td> --}}
                        <td>
                
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                    <a href="{!! route('tasks.show', [$task->id]) !!}" 
                         data-toggle="tooltip"  title="vizualizeaza" style = "padding: 0.9rem"
                        class="btn btn-success btn-lg"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->id]) !!}"
                        data-toggle="tooltip"  title="modifica"
                        style = "padding: 0.9rem"
                        class='btn btn-warning btn-lg' >
                        <i class="glyphicon glyphicon-edit"></i></a>
                
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>',
                         ['type' => 'submit',
                         'data-toggle' => 'tooltip',
                         'title' => 'sterge',
                         'style' => 'padding: 0.9rem',
                          'class' => 'btn btn-danger btn-lg',
                          'onclick' => "return confirm('Esti sigur ca vrei sa stergi?')"]) !!}
                {!! Form::close() !!}
                        </td>
                    </tr>
    </tbody>

@endforeach
 



</table>

    <table class="table table-responsive" id="tasks-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Pers Create</th>
            <th>Subject</th>
            <th>Pers Assign</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Repository</th>
            <th>Departament</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
 <h3> Task-uri de observat:</h3>

 @foreach($tasks_w as $task)
{{-- {{ dd($task)}} --}}
    <tbody>
        <tr><td>
                        <a href="{!! route('tasks.show', [$task->id]) !!}" ><i >
                            <code>{!! $task->id !!}</code></i></a>
                        </td>
                        <td><a href="{!! route('informatii', [$task->pers_create]) !!}"><code>
                          {!! $task->p_create->name !!}</code></a></td>
                        <td>
                        <a href="{!! route('tasks.show', [$task->id]) !!}" ><i >
                            <code>{!! $task->subject !!}</code></i></a>
                        </td>
                        <td><a href="{!! route('informatii', [$task->pers_assign]) !!}"><code>
                          {!! $task->p_assign->name !!}</code></a></td>
                        <td>{!! $task->status->name or ' ' !!}</td>
                        <td>{!! $task->priority->name or ' ' !!}</td>
                        <td>{!! $task->repository->name or ' ' !!}</td>
                        <td>{!! $task->departament['name'] !!}</td>
                        {{-- <td> <img src="{!! $task->fisier  !!}" alt="{!! $task->fisier  !!}"
                            class="img-responsive" width="150" height="150"></td> --}}
                        <td>
                
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                    <a href="{!! route('tasks.show', [$task->id]) !!}" 
                         data-toggle="tooltip"  title="vizualizeaza" style = "padding: 0.9rem"
                        class="btn btn-success btn-lg"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->id]) !!}"
                        data-toggle="tooltip"  title="modifica"
                        style = "padding: 0.9rem"
                        class='btn btn-warning btn-lg' >
                        <i class="glyphicon glyphicon-edit"></i></a>
                
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>',
                         ['type' => 'submit',
                         'data-toggle' => 'tooltip',
                         'title' => 'sterge',
                         'style' => 'padding: 0.9rem',
                          'class' => 'btn btn-danger btn-lg',
                          'onclick' => "return confirm('Esti sigur ca vrei sa stergi?')"]) !!}
                {!! Form::close() !!}
                        </td>
                    </tr>
    </tbody>

@endforeach
 
</table>



    <table class="table table-responsive" id="tasks-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Pers Create</th>
            <th>Subject</th>
            <th>Pers Assign</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Repository</th>
            <th>Departament</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
 <h3>Task-uri create de mine:</h3>

 @foreach($tasks_created as $task)

    <tbody>
        <tr><td>
                        <a href="{!! route('tasks.show', [$task->id]) !!}" ><i >
                            <code>{!! $task->id !!}</code></i></a>
                        </td>
                        <td><a href="{!! route('informatii', [$task->pers_create]) !!}"><code>
                          {!! $task->p_create->name !!}</code></a></td>
                        <td>
                        <a href="{!! route('tasks.show', [$task->id]) !!}" ><i >
                            <code>{!! $task->subject !!}</code></i></a>
                        </td>
                        <td><a href="{!! route('informatii', [$task->pers_assign]) !!}"><code>
                          {!! $task->p_assign->name !!}</code></a></td>
                        <td>{!! $task->status->name or ' ' !!}</td>
                        <td>{!! $task->priority->name or ' ' !!}</td>
                        <td>{!! $task->repository->name or ' ' !!}</td>
                        <td>{!! $task->departament['name'] !!}</td>
                        {{-- <td> <img src="{!! $task->fisier  !!}" alt="{!! $task->fisier  !!}"
                            class="img-responsive" width="150" height="150"></td> --}}
                        <td>
                
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                    <a href="{!! route('tasks.show', [$task->id]) !!}" 
                         data-toggle="tooltip"  title="vizualizeaza" style = "padding: 0.9rem"
                        class="btn btn-success btn-lg"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->id]) !!}"
                        data-toggle="tooltip"  title="modifica"
                        style = "padding: 0.9rem"
                        class='btn btn-warning btn-lg' >
                        <i class="glyphicon glyphicon-edit"></i></a>
                
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>',
                         ['type' => 'submit',
                         'data-toggle' => 'tooltip',
                         'title' => 'sterge',
                         'style' => 'padding: 0.9rem',
                          'class' => 'btn btn-danger btn-lg',
                          'onclick' => "return confirm('Esti sigur ca vrei sa stergi?')"]) !!}
                {!! Form::close() !!}
                        </td>
                    </tr>
    </tbody>

@endforeach

</table>



















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
</div>


@yield('task')



@endauth
 @guest
        <div class=" row justify-content-center col-md-offset-2 col-md-6">
            <h3>    Pentru a vedea aceasta pagina trebuie sa va autentificati. </h3>
        </div>
 @endguest
@endsection