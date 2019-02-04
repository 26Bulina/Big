<table class="table table-responsive" id="employees-table">
    <thead>
        <tr>
            <th>First name</th>
        <th>Last Name</th>
        <th>Cnp</th>
        <th>Address</th>
        <th>Personal Phone</th>
        <th>Personal Email</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Superior Id</th>
        <th>Job</th>
        <th>admin</th>
        <th>Photo</th>
        <th>Hours Norm</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>{!! $employee->first_name !!}</td>
            <td>{!! $employee->last_name !!}</td>
            <td>{!! $employee->cnp !!}</td>
            <td>{!! $employee->address !!}</td>
            <td>{!! $employee->personal_phone !!}</td>
            <td>{!! $employee->personal_email !!}</td>
            <td>{!! $employee->start_date !!}</td>
            <td>{!! $employee->end_date !!}</td>
            <td>{!! $employee->superior_id !!}</td>
            <td>{!! $employee->job !!}</td>
            <td>{!! $employee->admin !!}</td>
            <td>{!! $employee->photo !!}</td>
            <td>{!! $employee->hours_norm !!}</td>
            <td>
                {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('employees.show', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('employees.edit', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>