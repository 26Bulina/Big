<table class="table table-responsive" id="watchers-table">
    <thead>
        <tr>
            <th>Task Id</th>
        <th>User Id</th>
        <th>Watched</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($watchers as $watcher)
        <tr>
            <td>{!! $watcher->task_id !!}</td>
            <td>{!! $watcher->user->name !!}</td>
            <td>{!! $watcher->watched !!}</td>
            <td>
                {!! Form::open(['route' => ['watchers.destroy', $watcher->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('watchers.show', [$watcher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('watchers.edit', [$watcher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>