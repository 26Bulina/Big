<table class="table table-responsive" id="remembers-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Date</th>
        <th>Message</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($remembers as $remember)
        <tr>
            <td>{!! $remember->user_id !!}</td>
            <td>{!! $remember->date !!}</td>
            <td>{!! $remember->message !!}</td>
            <td>
                {!! Form::open(['route' => ['remembers.destroy', $remember->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('remembers.show', [$remember->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('remembers.edit', [$remember->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>