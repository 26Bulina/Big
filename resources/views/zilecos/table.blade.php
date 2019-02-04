<table class="table table-responsive" id="zilecos-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Tipconcediu Id</th>
        <th>Nr Zile</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($zilecos as $zileco)
        <tr>
            <td>{!! $zileco->user_id !!}</td>
            <td>{!! $zileco->tipconcediu_id !!}</td>
            <td>{!! $zileco->nr_zile !!}</td>
            <td>
                {!! Form::open(['route' => ['zilecos.destroy', $zileco->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('zilecos.show', [$zileco->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('zilecos.edit', [$zileco->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>