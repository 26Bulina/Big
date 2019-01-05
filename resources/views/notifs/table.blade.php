<table class="table table-responsive" id="notifs-table">
    <thead>
        <tr>
            <th>Pers Create</th>
        <th>Title</th>
        <th>Body</th>
        <th>Modif App</th>
        <th>Happy Team</th>
        <th>Work Team</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($notifs as $notif)
        <tr>
            <td>{!! $notif->user->name!!}</td>
            <td>{!! $notif->title !!}</td>
            <td>{!! $notif->body !!}</td>
            <td>{!! $notif->modif_app !!}</td>
            <td>{!! $notif->happy_team !!}</td>
            <td>{!! $notif->work_team !!}</td>
            <td>
                {!! Form::open(['route' => ['notifs.destroy', $notif->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notifs.show', [$notif->id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('notifs.edit', [$notif->id]) !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>