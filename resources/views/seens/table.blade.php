<table class="table table-responsive" id="seens-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Task Id</th>
        <th>Notif Id</th>
        <th>Seen</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($seens as $seen)
        <tr>
            <td>{!! $seen->user_id !!}</td>
            <td>{!! $seen->task_id !!}</td>
            <td>{!! $seen->notif_id !!}</td>
            <td>{!! $seen->seen !!}</td>
            <td>
                {!! Form::open(['route' => ['seens.destroy', $seen->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('seens.show', [$seen->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('seens.edit', [$seen->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>