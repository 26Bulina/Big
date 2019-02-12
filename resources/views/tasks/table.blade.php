





<table>
<tbody>
    @foreach($repositories as $repo)
        {{-- <a class="padd list-group-item" href="{{ route('repository',$repo->id) }} " >  --}}
         <h3>{{ $repo->name}} </h3>
        {{-- {!! dd($repositories)!!} --}}
          {{--   <span class="badge pull-right badge-primary" style="background: #D67FFFFF;
            position:relative;"> {{ $repo->tasks->count() }}</span> --}}
        {{-- </a> --}}

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
            {{-- <th>Fisier/attach</th> --}}
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>


{{  $tasks = App\Models\task::latest()
                 ->where('repository_id',$repo->id)
                 ->search ($s)
                 ->paginate(5)
        }}


        <div class="container"  align="center">
            {{-- {{ $tasks->links("pagination::bootstrap-4")}} --}}
            {{-- {{ $tasks->links("pagination::bootstrap-4")}} --}}
              {{-- appends(['s' => $s])-> --}}  
        </div>

        @if(count($tasks)>0)
                @foreach($tasks as $task)
                    <tr><td>
                        <a href="{!! route('tasks.show', [$task->id]) !!}" ><i >
                            <code>{!! $task->id !!}</code></i></a>
                        </td>
                        <td>{!! $task->p_create->name !!}</td>
                        <td>
                        <a href="{!! route('tasks.show', [$task->id]) !!}" ><i >
                            <code>{!! $task->subject !!}</code></i></a>
                        </td>
                        <td>{!! $task->p_assign->name !!}</td>
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

        <div class="container"  align="center">
            {{-- {{ $tasks->links("pagination::bootstrap-4")}} --}}
            {{ $tasks->links("pagination::bootstrap-4")}}
              {{-- appends(['s' => $s])-> --}} 
        </div> 
      
    </tbody>
    </table>
        
    @endforeach


</tbody>
</table>