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
            <td>{!! $zileco->user->name or ' ' !!}</td>
            <td>{!! $zileco->tipconcediu->name or ' ' !!}</td>
            <td>{!! $zileco->nr_zile !!}</td>
            <td>
                

                {!! Form::open(['route' => ['zilecos.destroy', $zileco->id], 'method' => 'delete']) !!}
                    <a href="{!! route('zilecos.show', [$zileco->id]) !!}" 
                         data-toggle="tooltip"  title="vizualizeaza" style = "padding: 0.9rem"
                        class="btn btn-success btn-lg"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('zilecos.edit', [$zileco->id]) !!}"
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