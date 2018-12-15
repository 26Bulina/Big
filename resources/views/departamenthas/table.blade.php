<table class="table table-responsive" id="departamentHas-table">
    <thead>
        <tr>
            <th>Task Id</th>
        <th>User Id</th>
        <th>Departament Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departamentHas as $departamentHas)
        <tr>
            <td>{!! $departamentHas->task_id !!}</td>
            <td>{!! $departamentHas->user_id !!}</td>
            <td>{!! $departamentHas->departament_id !!}</td>
            <td>
                {!! Form::open(['route' => ['departamentHas.destroy', $departamentHas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('departamentHas.show', [$departamentHas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('departamentHas.edit', [$departamentHas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>