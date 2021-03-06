<table class="table table-responsive" id="departaments-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departaments as $departament)
        <tr>
            <td>{!! $departament->name !!}</td>
            <td>{!! $departament->description !!}</td>
            <td>
                {!! Form::open(['route' => ['departaments.destroy', $departament->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('departaments.show', [$departament->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('departaments.edit', [$departament->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>