<table class="table table-responsive" id="todoLists-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Note Name</th>
        <th>Done</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($todoLists as $todoList)
        <tr>
            <td>{!! $todoList->user_id !!}</td>
            <td>{!! $todoList->note_name !!}</td>
            <td>{!! $todoList->done !!}</td>
            <td>
                {!! Form::open(['route' => ['todoLists.destroy', $todoList->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('todoLists.show', [$todoList->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('todoLists.edit', [$todoList->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>