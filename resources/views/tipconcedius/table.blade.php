<table class="table table-responsive" id="tipconcedius-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipconcedius as $tipconcediu)
        <tr>
            <td>{!! $tipconcediu->name !!}</td>
            <td>{!! $tipconcediu->description !!}</td>
            <td>
                {!! Form::open(['route' => ['tipconcedius.destroy', $tipconcediu->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipconcedius.show', [$tipconcediu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipconcedius.edit', [$tipconcediu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>