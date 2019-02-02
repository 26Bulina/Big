@extends('layouts.app')
@section('content')

<div class="container">
  <!-- submeniuri -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#tab1">Menu</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab2">all</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#tab3">fa-fa</a>
    </li>
  </ul>
  <!-- continut submeniuri -->
  <div class="tab-content">
    {{-- tab 1 --}}
    <div id="tab1" class="container tab-pane active"><br>
      <div class="panel-group">
        {{-- only admin --}}
        <div class="panel panel-default">
            <a class="list-group-item" data-toggle="collapse" href="#admin">
            Admin <span class="fa fa-unlock-alt" aria-hidden="true"></span>   </a>
            <div class="panel-body">
              <a href="{!! route('departaments.index') !!}" class="list-group-item">Department</a>
              <a href="{!! route('statuses.index') !!}" class="list-group-item">Status</a>
              <a href="{!! route('priorities.index') !!}" class="list-group-item">Priority</a>
              <a href="{!! route('repositories.index') !!}" class="list-group-item">Repository</a>
            </div>
        </div>
        {{-- all the users --}}
        <div class="panel panel-default">
            <a href="{!! route('tasks.index') !!}" class="padd list-group-item">
            <span class="fa fa-thumbtack fa-3x" aria-hidden="true"></span>  Tasks
            <span class="badge badge-primary" style="background: #D67FFFFF; position:relative;">
              {{ App\Models\task::all()->count() }}
            </span> </a>
        </div>
      </div>
    </div>
    {{-- tab 2 --}}
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

            <li class="{{ Request::is('watchers*') ? 'active' : '' }}">
                <a href="{!! route('watchers.index') !!}">
                  <i class="fa fa-edit"></i><span>Watchers</span></a>
            </li>

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
    {{-- tab 3 --}}
    <div id="tab3" class="container tab-pane fade"><br>
      <div class="row justify-content-center">
            <a href="#" class="padd list-group-item">
                <span class="fa fa-users" aria-hidden="true"></span> 
                <span class="fa fa-user-plus" aria-hidden="true"></span>
                <span class="fa fa-user-secret" aria-hidden="true"></span>   
                <span class="fa fa-thumbs-up" aria-hidden="true"></span> 
                <span class="fa fa-thumbtack" aria-hidden="true"></span>
                <span class="fa fa-bell" aria-hidden="true"></span>
                <span class="fa fa-tools" aria-hidden="true"></span> 
                <span class="fa fa-comment" aria-hidden="true"></span>
                <span class="fa fa-shopping-basket" aria-hidden="true"></span>
                <span class="fa fa-paper-clip" aria-hidden="true"></span> 
                <span class="fa fa-keyboard" aria-hidden="true"></span>
            </a>
      </div>
      <div class="row justify-content-center">
            <div class="card">
              <div class="card-header"> Idei </div>
              <div class="card-body">
                <div id="accordion">
                  <div class="card">
                    <div class="card-header" id="item1">
                      <h5 class="mb-0"> 
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">  Item #1 </button>
                      </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="item1" data-parent="#accordion"><div class="card-body"> body 1  </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="item2">
                      <h5 class="mb-0">
                      <button class="btn btn-link " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="item2"> Item #2
                      </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body">body 2  </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection