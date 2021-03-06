@extends('layouts.app')
@section('content')


<div class="container">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header">Dashboard</div>
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
        @endif
        <div class="alert alert-success" role="alert">
          <p> Esti logat ca ADMINISTRATOR</p>
        </div>
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>NR</th>
              <th>nume membru</th>
              <th>mail</th>
              <th>id</th>
              <th>admin</th>
              <th>employee_id</th>
            </tr>
          </thead>
          <?php $key=0; ?>
          <tbody>
            @foreach( $users as $key => $value )
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->email }}</td>
              <td>{{ $value->id }}</td>
              <td>{{ $value->admin }}</td>
              <td>{{ $value->employee_id }}</td>
            </tr>
            @endforeach
          </tbody>


        </table>

      </div>
    </div>

  </div>



 <div class="row justify-content-center">



    <table>
    @foreach($repositories as $repository)
        <tr>
            <td>{!! $repository->name !!}</td>
        </tr>
    @endforeach
  </table>




</div>



</div>

@endsection