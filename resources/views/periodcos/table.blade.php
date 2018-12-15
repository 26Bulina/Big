<table class="table table-responsive" id="periodcos-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Start Date</th>
        <th>End Date</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($periodcos as $periodco)
        <tr>
            <td>{!! $periodco->user_id !!}</td>
            <td>{!! $periodco->start_date !!}</td>
            <td>{!! $periodco->end_date !!}</td>
            <td>
                {!! Form::open(['route' => ['periodcos.destroy', $periodco->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('periodcos.show', [$periodco->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('periodcos.edit', [$periodco->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>