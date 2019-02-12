<div class="container">
  <!-- submeniuri -->
  <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          {{-- <a class="nav-link active" data-toggle="tab" href="#tab1">Menu</a> --}}
        </li>
{{--         <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab2">all</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#tab3">Notificari</a>
        </li> --}}
  </ul>
  <!-- continut submeniuri -->
  <div class="tab-content">

  {{-- select 
              d.name departament, u.name username,  
              e.first_name nume, e.last_name prenume, 
              j.name functie, 
              boss.first_name superior, boss.last_name superior , js.name functie_superior
                 from employees e
                    left join employees boss on boss.id=e.superior_id
                    left join users u on u.employee_id=e.id
                    left join jobs j on j.id=e.job
                    left join jobs js on js.id=boss.job
                    left join departaments d on d.id=j.departament_id
                    where e.end_date is null or e.end_date>'2019-02-04'
                    ; --}}


    <!-- tab 1  -->
    <div id="tab1" class="container tab-pane active"><br>
      <div class="panel-group">
        <!-- only admin   -->
        @if (Auth::user()->admin == 2)
        <div class="panel panel-default">
            <h4 class="list-group-item" data-toggle="collapse"> Admin</h4>
            <div class="panel-body">
              {{-- <a href="{!! route('departaments.index') !!}" class="list-group-item">Department</a> --}}
              <a href="{!! route('statuses.index') !!}" class="list-group-item">Status</a>
              <a href="{!! route('priorities.index') !!}" class="list-group-item">Priority</a>
              
            </div>
        </div>
        <div class="panel panel-default">
            {{-- <a  href="#"> Repo <span class="fa fa-unlock-alt" aria-hidden="true"></span></a> --}}
          {{--   <table>
                  @foreach($repositories as $repository)
                      <tr>
                          <a href="#" class="list-group-item">{!! $repository->name !!}</a>
                      </tr>
                  @endforeach
            </table> --}}
        </div>
        @endif
        <!-- admin + hr -->
        @if (Auth::user()->admin <> 0)
        <div class="panel panel-default">
            <h4 class="list-group-item" data-toggle="collapse"> HR </h4>
            <div class="panel-body">
              <a href="{!! route('employees.index') !!}" class="list-group-item">Angajati</a>
              <a href="{!! route('zilecos.index') !!}" class="list-group-item">Zile concediu</a>
              <a href="{!! route('tipconcedius.index') !!}" class="list-group-item">Tip concediu</a>
              <a href="{!! route('jobs.index') !!}" class="list-group-item">Functii</a>
              <a href="{!! route('departaments.index') !!}" class="list-group-item">Departamente</a>
              
            </div>
        </div>
        @endif
        <!-- all users -->
        <h4 class="list-group-item" data-toggle="collapse"> Meniu </h4>
        <div class="panel ">
            <a href="{!! route('notifs.index') !!}" class="list-group-item">Notificari</a>
            <a href="{!! route('repositories.index') !!}" class="list-group-item">Repository</a>
            <a class="padd list-group-item" href="{!! route('tasks.index') !!}" >
            <span class="fa fa-thumbtack fa-3x" aria-hidden="true"></span>  Tasks
            <span class="badge badge-primary" style="background: #316BCDFF; position:relative;">
              {{ App\Models\task::all()->count() }} </span> 
            </a>

            
        </div>



      </div>
    </div>

    <!-- tab 2 -->
    <div id="tab2" class="container tab-pane fade"><br>

            <li class="{{ Request::is('remembers*') ? 'active' : '' }}">
                <a href="{!! route('remembers.index') !!}">
                  <i class="fa fa-edit"></i><span>Remembers</span></a>
            </li>

            <li class="{{ Request::is('todoLists*') ? 'active' : '' }}">
                <a href="{!! route('todoLists.index') !!}">
                  <i class="fa fa-edit"></i><span>Todo Lists</span></a>
            </li>

            <li class="{{ Request::is('periodcos*') ? 'active' : '' }}">
                <a href="{!! route('periodcos.index') !!}">
                  <i class="fa fa-edit"></i><span>Periodcos</span></a>
            </li>

            <li class="{{ Request::is('statuses*') ? 'active' : '' }}">
                <a href="{!! route('statuses.index') !!}">
                  <i class="fa fa-edit"></i><span>Statuses</span></a>
            </li>

            <li class="{{ Request::is('priorities*') ? 'active' : '' }}">
                <a href="{!! route('priorities.index') !!}">
                  <i class="fa fa-edit"></i><span>priorities</span></a>
            </li>

            <li class="{{ Request::is('repositories*') ? 'active' : '' }}">
                <a href="{!! route('repositories.index') !!}">
                  <i class="fa fa-edit"></i><span>repositories</span></a>
            </li>
            <li class="{{ Request::is('departaments*') ? 'active' : '' }}">
                <a href="{!! route('departaments.index') !!}">
                  <i class="fa fa-edit"></i><span>Departaments</span></a>
            </li>

            <li class="{{ Request::is('tasks*') ? 'active' : '' }}">
                <a href="{!! route('tasks.index') !!}">
                  <i class="fa fa-edit"></i>
                <span>Tasks</span></a>
            </li>

           {{--  <li class="{{ Request::is('watchers*') ? 'active' : '' }}">
                <a href="{!! route('watchers.index') !!}">
                  <i class="fa fa-edit"></i><span>Watchers</span></a>
            </li> --}}

            <li class="{{ Request::is('seens*') ? 'active' : '' }}">
                <a href="{!! route('seens.index') !!}">
                  <i class="fa fa-edit"></i><span>Seens</span></a>
            </li>

            <li class="{{ Request::is('comments*') ? 'active' : '' }}">
                <a href="{!! route('comments.index') !!}">
                  <i class="fa fa-edit"></i><span>Comments</span></a>
            </li>

            <li class="{{ Request::is('employees*') ? 'active' : '' }}">
                <a href="{!! route('employees.index') !!}">
                  <i class="fa fa-edit"></i><span>Employees</span></a>
            </li>

            <li class="{{ Request::is('jobs*') ? 'active' : '' }}">
                <a href="{!! route('jobs.index') !!}">
                  <i class="fa fa-edit"></i><span>Jobs</span></a>
            </li>

            <li class="{{ Request::is('tipconcedius*') ? 'active' : '' }}">
                <a href="{!! route('tipconcedius.index') !!}">
                  <i class="fa fa-edit"></i><span>Tipconcedius</span></a>
            </li>

            <li class="{{ Request::is('zilecos*') ? 'active' : '' }}">
                <a href="{!! route('zilecos.index') !!}">
                  <i class="fa fa-edit"></i><span>Zilecos</span></a>
            </li>

            <li class="{{ Request::is('notifs*') ? 'active' : '' }}">
                <a href="{!! route('notifs.index') !!}">
                  <i class="fa fa-edit"></i><span>Notifs</span></a>
            </li>
    </div>
    <!-- tab 3 -->
    <div id="tab3" class="container tab-pane fade">

      

    {{--   <div class="panel panel-default">
            <h4 class="list-group-item" data-toggle="collapse"> N
              @if (Auth::user()->admin == 2)
              <div class="row">
                <h1 class="col-sm-5 col-md-offset-10">
                   <a class="btn btn-primary pull-right" style="margin-top: 0px;margin-bottom: 5px" href="{!! route('notifs.create') !!}">Add new</a>
                </h1>
                </div>
              @endif
            </h4>
            <div class="panel-body">
              <a href="{!! route('notifs.index') !!}" class="list-group-item">notificari</a>
            </div>
        </div>
 --}}


{{-- 
@if(count($notification1))
<div class="card  col-md-12">
  <div class="card-header"> Update-uri </div>
  <div class="card-body">
    @foreach($notification1 as $notif)
    <div class="row">
      <div class="col-xs-12"> <h5>{{ $notif->title }}</hr>  </h5> </div>
      <div class="col-xs-2">
            @if (Auth::user()->admin == 2)
            <td>
              {!! Form::open(['route' => ['notifs.destroy', $notif->id], 'method' => 'delete']) !!}
              <div class='btn-group'>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
              </div>
              {!! Form::close() !!}
            </td>
            @endif
      </div>
      </div>
      <div class="row"> {{ $notif->body }} </div>
      <hr>
      @endforeach
  </div>
  @endif

</div>
@if(count($notification2))
<div class="card  col-md-12">
  <div class="card-header"> Happy Team </div>
  <div class="card-body">
    @foreach($notification2 as $notif)
    <div class="row">
      <div class="col-xs-12"> <h5>{{ $notif->title }}</hr>  </h5> </div>
      <div class="col-xs-2">
            @if (Auth::user()->admin <> 0)
            <td>
              {!! Form::open(['route' => ['notifs.destroy', $notif->id], 'method' => 'delete']) !!}
              <div class='btn-group'>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
              </div>
              {!! Form::close() !!}
            </td>
            @endif
      </div>
      </div>
      <div class="row"> {{ $notif->body }} </div>
      <hr>
      @endforeach
  </div>
  @endif

</div>
@if(count($notification3))
<div class="card  col-md-12">
  <div class="card-header"> Update-uri </div>
  <div class="card-body">
    @foreach($notification3 as $notif)
    <div class="row">
      <div class="col-xs-12"> <h5>{{ $notif->title }}</hr>  </h5> </div>
      <div class="col-xs-2">
            @if (Auth::user()->admin <> 0)
            <td>
              {!! Form::open(['route' => ['notifs.destroy', $notif->id], 'method' => 'delete']) !!}
              <div class='btn-group'>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
              </div>
              {!! Form::close() !!}
            </td>
            @endif
      </div>
      </div>
      <div class="row"> {{ $notif->body }} </div>
      <hr>
      @endforeach
  </div>
  @endif


  </div>



    </div>
  </div>
</div>
 --}}