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
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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


<li class="{{ Request::is('items*') ? 'active' : '' }}">
	<a href="{!! route('items.index') !!}"><i class="fa fa-edit"></i><span>Items</span></a>
</li>
<li class="{{ Request::is('notifications*') ? 'active' : '' }}">
	<a href="{!! route('notifications.index') !!}"><i class="fa fa-edit"></i><span>Notifications</span></a>
</li>
<li class="{{ Request::is('notifs*') ? 'active' : '' }}">
	<a href="{!! route('notifs.index') !!}"><i class="fa fa-edit"></i><span>Notifs</span></a>
</li>
<li class="{{ Request::is('empls*') ? 'active' : '' }}">
	<a href="{!! route('empls.index') !!}"><i class="fa fa-edit"></i><span>empls</span></a>
</li>
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
			</div>
		</div>
	</div>
</div>
@endsection