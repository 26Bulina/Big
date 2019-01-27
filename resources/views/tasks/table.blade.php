@auth

 <div class="container"  align="center">
                {{-- {{ $tasks->links("pagination::bootstrap-4")}} --}}
                {{ $tasks->
                    {{-- appends(['s' => $s])-> --}}
                    links("pagination::bootstrap-4")}}
        </div>

<table class="table table-responsive" id="tasks-table">
    <thead>
        <tr>
            <th>Subject</th>
            <th>Body</th>
            <th>Pers Create</th>
            <th>Pers Assign</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Repository</th>
            <th>departament</th>
            <th>Fisier/attach</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($tasks as $task)
        <tr>
            <td>
                <a href="{!! route('tasks.show', [$task->id]) !!}" ><i ><code>{!! $task->subject !!}</code></i></a>
            </td>
            <td>{!! $task->body !!}</td>
            <td>{!! $task->p_create->name !!}</td>
            <td>{!! $task->p_assign->name !!}</td>
            <td>{!! $task->status->name or ' ' !!}</td> {{-- status->name  hasMany in Model--}}
            <td>{!! $task->priority->name or ' ' !!}</td>
            <td>{!! $task->repository->name or ' ' !!}</td>
            <td>{!! $task->departament['name'] !!}</td>
            <td>{!! $task->fisier or ' ' !!}</td>
            <td>
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tasks.show', [$task->id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach           
    </tbody>
</table>

       <div class="container"  align="center">
                {{-- {{ $tasks->links("pagination::bootstrap-4")}} --}}
                {{ $tasks->
                    {{-- appends(['s' => $s])-> --}}
                    links("pagination::bootstrap-4")}}
        </div>
@endauth 

     @guest
        <div><h1>    Sorry bro, nu esti logat </h1></div>
     @endguest