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
                    <a href="{!! route('tipconcedius.show', [$tipconcediu->id]) !!}" 
                         data-toggle="tooltip"  title="vizualizeaza" style = "padding: 0.9rem"
                        class="btn btn-success btn-lg"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipconcedius.edit', [$tipconcediu->id]) !!}"
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