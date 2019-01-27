{{-- inclus in layouts.app --}}

     
 

<div class="panel-group">
    <div class="panel panel-default">
        <a href="ideas" class="padd list-group-item">
                    <span class="fa fa-paper-plane" aria-hidden="true"></span> Ideas
        </a>
    </div>

    <div class="panel panel-default">
        <a class="list-group-item" data-toggle="collapse" href="#admin">
           Admin <span class="fa fa-unlock-alt" aria-hidden="true"></span>
        </a>
        {{-- <div class="panel-collapse collapse" id="admin"> --}} {{--hide/show the menu--}}
            <div class="panel-body">
                <a href="{!! route('departaments.index') !!}" class="list-group-item">Department</a>
                <a href="{!! route('statuses.index') !!}" class="list-group-item">Status</a>
                <a href="{!! route('priorities.index') !!}" class="list-group-item">Priority</a>
                <a href="{!! route('repositories.index') !!}" class="list-group-item">Repository</a>
            </div>
        {{-- </div> --}}
    </div>
     <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>


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

<hr>


<div>
        <a href="#" class="padd list-group-item">
                    <span class="fa fa-users" aria-hidden="true"></span> 
                    <span class="fa fa-user-plus" aria-hidden="true"></span>
                    <span class="fa fa-user-secret" aria-hidden="true"></span>   
        </a>
        <a href="#" class="padd list-group-item">
                    <span class="fa fa-thumbs-up" aria-hidden="true"></span> 
                    <span class="fa fa-thumbtack" aria-hidden="true"></span>
                    <span class="fa fa-bell" aria-hidden="true"></span>
        </a>
        <a href="#" class="padd list-group-item">
                    <span class="fa fa-tools" aria-hidden="true"></span> 
                    <span class="fa fa-comment" aria-hidden="true"></span>
                    <span class="fa fa-shopping-basket" aria-hidden="true"></span>
                    <span class="fa fa-paper-clip" aria-hidden="true"></span> 
                    <span class="fa fa-keyboard" aria-hidden="true"></span>
        </a>
</div>

