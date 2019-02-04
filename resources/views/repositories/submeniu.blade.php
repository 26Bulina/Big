<table class="table table-responsive" id="repositories-table">
<thead>
    o sa fie
</thead> repository
<tbody>


<? use app\models\repository; ?>

    @foreach($repositories as $repository)
        <tr>
            <td><a href="{!! route('repositories.show', [$repository->id]) !!}" >{!! $repository->name !!}</a></td>
            <td>
                {!! Form::open(['route' => ['repositories.destroy', $repository->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('repositories.edit', [$repository->id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</tbody>
</table>