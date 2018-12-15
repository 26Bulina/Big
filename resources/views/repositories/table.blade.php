<table class="table table-responsive" id="repositories-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($repositories as $repository)
        <tr>
            <td>{!! $repository->name !!}</td>
            <td>{!! $repository->description !!}</td>
            <td>
                {!! Form::open(['route' => ['repositories.destroy', $repository->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('repositories.show', [$repository->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('repositories.edit', [$repository->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>