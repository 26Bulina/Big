<table class="table table-responsive" id="tasks-table">
    <thead>
        <tr>
            <th>Subject</th>
        <th>Body</th>
        <th>Pers Create</th>
        <th>Pers Assign</th>
        <th>Status Id</th>
        <th>Priority Id</th>
        <th>Repository Id</th>
        <th>Fisier</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{!! $task->subject !!}</td>
            <td>{!! $task->body !!}</td>
            <td>{!! $task->pers_create !!}</td>
            <td>{!! $task->pers_assign !!}</td>
            <td>{!! $task->status_id !!}</td> {{-- status->name  hasMany in Model--}}
            <td>{!! $task->priority_id !!}</td>
            <td>{!! $task->repository_id !!}</td>
            <td>{!! $task->fisier !!}</td>
            <td>
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tasks.show', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>