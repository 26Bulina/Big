@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="card">
			<div class="card-header">
				Idei frate
			</div>
			<div class="card-body">
				<div id="accordion">
					<div class="card">
						<div class="card-header" id="headingOne">
							<h5 class="mb-0">
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Collapsible Group Item #1
							</button>
							</h5>
						</div>
						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
<div class="panel-group">
    <div class="panel panel-default">
        <a class="list-group-item" data-toggle="collapse" href="#admin">
           Admin <span class="fa fa-unlock-alt" aria-hidden="true"></span>
        </a>
            <div class="panel-body">
                <a href="{!! route('departaments.index') !!}" class="list-group-item">Department</a>
                <a href="{!! route('statuses.index') !!}" class="list-group-item">Status</a>
                <a href="{!! route('priorities.index') !!}" class="list-group-item">Priority</a>
                <a href="{!! route('repositories.index') !!}" class="list-group-item">Repository</a>
            </div>
    </div>
    <div class="panel panel-default">
        <a href="{!! route('tasks.index') !!}" class="padd list-group-item">
                    <span class="fa fa-thumbtack fa-3x" aria-hidden="true"></span>  Tasks 
                    <span class="badge badge-primary" style="background: #D67FFFFF; position:relative;">
                            {{ App\Models\task::all()
                            ->count() }}
                    </span>
                    <span class="badge badge-primary" > {{app\models\task::get()->count() }}</span>

        </a>
    </div>
</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingTwo">
							<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							Collapsible Group Item #2
							</button>
							</h5>
						</div>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="card-body">
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingThree">
							<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							Collapsible Group Item #3
							</button>
							</h5>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="card-body">
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							</div>
						</div>
					</div>
				</div>



<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
   
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
























<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
</div>
<div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
</div>

















<li class="{{ Request::is('remembers*') ? 'active' : '' }}">
    <a href="{!! route('remembers.index') !!}"><i class="fa fa-edit"></i><span>Remembers</span></a>
</li>

<li class="{{ Request::is('todoLists*') ? 'active' : '' }}">
    <a href="{!! route('todoLists.index') !!}"><i class="fa fa-edit"></i><span>Todo Lists</span></a>
</li>

<li class="{{ Request::is('periodcos*') ? 'active' : '' }}">
    <a href="{!! route('periodcos.index') !!}"><i class="fa fa-edit"></i><span>Periodcos</span></a>
</li>

<li class="{{ Request::is('statuses*') ? 'active' : '' }}">
    <a href="{!! route('statuses.index') !!}"><i class="fa fa-edit"></i><span>Statuses</span></a>
</li>

<li class="{{ Request::is('priorities*') ? 'active' : '' }}">
    <a href="{!! route('priorities.index') !!}"><i class="fa fa-edit"></i><span>priorities</span></a>
</li>

<li class="{{ Request::is('repositories*') ? 'active' : '' }}">
    <a href="{!! route('repositories.index') !!}"><i class="fa fa-edit"></i><span>repositories</span></a>
</li>
<li class="{{ Request::is('departaments*') ? 'active' : '' }}">
    <a href="{!! route('departaments.index') !!}"><i class="fa fa-edit"></i><span>Departaments</span></a>
</li>

<li class="{{ Request::is('tasks*') ? 'active' : '' }}">
    <a href="{!! route('tasks.index') !!}"><i class="fa fa-edit"></i><span>Tasks</span></a>
</li>


<li class="{{ Request::is('watchers*') ? 'active' : '' }}">
    <a href="{!! route('watchers.index') !!}"><i class="fa fa-edit"></i><span>Watchers</span></a>
</li>

<li class="{{ Request::is('seens*') ? 'active' : '' }}">
    <a href="{!! route('seens.index') !!}"><i class="fa fa-edit"></i><span>Seens</span></a>
</li>

<li class="{{ Request::is('comments*') ? 'active' : '' }}">
    <a href="{!! route('comments.index') !!}"><i class="fa fa-edit"></i><span>Comments</span></a>
</li>

<li class="{{ Request::is('employees*') ? 'active' : '' }}">
    <a href="{!! route('employees.index') !!}"><i class="fa fa-edit"></i><span>Employees</span></a>
</li>

<li class="{{ Request::is('jobs*') ? 'active' : '' }}">
    <a href="{!! route('jobs.index') !!}"><i class="fa fa-edit"></i><span>Jobs</span></a>
</li>

<li class="{{ Request::is('tipconcedius*') ? 'active' : '' }}">
    <a href="{!! route('tipconcedius.index') !!}"><i class="fa fa-edit"></i><span>Tipconcedius</span></a>
</li>

<li class="{{ Request::is('zilecos*') ? 'active' : '' }}">
    <a href="{!! route('zilecos.index') !!}"><i class="fa fa-edit"></i><span>Zilecos</span></a>
</li>

<li class="{{ Request::is('notifs*') ? 'active' : '' }}">
    <a href="{!! route('notifs.index') !!}"><i class="fa fa-edit"></i><span>Notifs</span></a>
</li>




			</div>
		</div>
	</div>
</div>
@endsection