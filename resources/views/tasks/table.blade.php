




<table>
<tbody>
    @foreach($repositories as $repo)
         <h3 style="color: #4B6BB3BD;">{{ $repo->name}} </h3> 
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
    <tbody>

        {{  $tasks_open = App\Models\task::latest()
                 ->where('repository_id',$repo->id)
                 ->whereNotIn('status_id',[3,4])
                 ->search ($s)
                 ->paginate(5)
        }}
        {{  $tasks_close = App\Models\task::latest()
                 ->where('repository_id',$repo->id)
                 ->whereIn('status_id',[3,4])
                 ->search ($s)
                 ->paginate(5)
                 }}


        @if(count($tasks_open)>0)
                @foreach($tasks_open as $task)
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
                @endforeach
        @endif
        @if(count($tasks_close)>0)
            @foreach($tasks_close as $task)
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
            @endforeach
        @endif


         
      
    </tbody>
    </table>
        
    @endforeach
</tbody>
</table>

        <div class="container"  align="center">
            {{ $tasks_open->links("pagination::bootstrap-4")}}
        </div> 
         {{-- appends(['s' => $s])-> --}}