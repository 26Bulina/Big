<table class="table table-responsive" id="notifications-table">
    <thead>
        <tr>
            <th>Type Id</th>
        <th>Title</th>
        <th>Body</th>
        <th>Read</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>

    @foreach($notifications as $notification)
        <tr>
            <td>{!! $notification->type_id !!}</td>
            <td>{!! $notification->title !!}</td>
            <td>{!! $notification->body !!}</td>
            <td>{!! $notification->read !!}</td>
            <td>{!! $notification->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['notifications.destroy', $notification->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notifications.show', [$notification->id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('notifications.edit', [$notification->id]) !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>