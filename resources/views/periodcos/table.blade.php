<table class="table table-responsive" id="periodcos-table">
    <thead> 
        <tr>
        <th>User Id</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Tip concediu</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($periodcos as $periodco)
        <tr>
            <td>{!! $periodco->user->name !!}</td>
            <td>{!! $periodco->start_date !!}</td>
            <td>{!! $periodco->end_date !!}</td>
            <td>{!! $periodco->tipconcediu_id !!}</td>
            <td>
                {!! Form::open(['route' => ['periodcos.destroy', $periodco->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('periodcos.edit', [$periodco->id]) !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>