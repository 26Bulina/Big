<table class="table table-responsive" id="repositories-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Departament</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($repositories as $repository)
        <tr>
            <td>{!! $repository->name !!}</td>            
            <td>{!! $repository->description !!}</td>
            <td>{!! $repository->departament_id !!}</td>
            <td>
                {!! Form::open(['route' => ['repositories.destroy', $repository->id], 'method' => 'delete']) !!}
                    <a href="{!! route('repositories.show', [$repository->id]) !!}" 
                         data-toggle="tooltip"  title="vizualizeaza" style = "padding: 0.9rem"
                        class="btn btn-success btn-lg"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('repositories.edit', [$repository->id]) !!}"
                        data-toggle="tooltip"  title="modifica"
                        style = "padding: 0.9rem"
                        class='btn btn-warning btn-lg' >
                        <i class="glyphicon glyphicon-edit"></i></a>
                
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>',
                         ['type' => 'submit',
                         'data-toggle' => 'tooltip',
                         'title' => 'sterge',
                         'style' => 'padding: 0.9rem',
                          'class' => 'btn btn-danger btn-lg',
                          'onclick' => "return confirm('Esti sigur ca vrei sa stergi?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>