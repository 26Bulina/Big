{{-- inclus in layouts.app --}}

    <div class="padd list-group">
        <a href="ideas"
            class="padd list-group-item active main-color-bg">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Ideas
        </a>
    </div>

    <div >
        <a href="#" class="padd list-group-item">
            <span class="fa fa-microchip" aria-hidden="true"></span> 
            ech <span class="badge">100</span>
        </a>
        <a href="#" class="padd list-group-item">
            <span class="fa fa-users" aria-hidden="true"></span> 
            <span class="fa fa-user-plus" aria-hidden="true"></span>
            <span class="fa fa-user-secret" aria-hidden="true"></span>
            
        </a>
        <a href="#" class="padd list-group-item">
            <span class="fa fa-caffee" aria-hidden="true"></span> 
            <span class="fa fa-comment" aria-hidden="true"></span>
            <span class="fa fa-shopping-basket" aria-hidden="true"></span>
        </a>
        <a href="#" class="padd list-group-item">
            <span class="fa fa-thumbs-up" aria-hidden="true"></span> 
            <span class="fa fa-thumbtack" aria-hidden="true"></span>
            <span class="fa fa-bell" aria-hidden="true"></span>
        </a>
        <a href="#" class="padd list-group-item">
            <span class="fa fa-paper-clip" aria-hidden="true"></span> 
            <span class="fa fa-paper-plane" aria-hidden="true"></span>
            <span class="fa fa-keyboard" aria-hidden="true"></span>
        </a>
    </div>





<li class="{{ Request::is('items*') ? 'active' : '' }}">
    <a href="{!! route('items.index') !!}"><i class="fa fa-edit"></i><span>Items</span></a>
</li>
<li class="{{ Request::is('notifications*') ? 'active' : '' }}">
    <a href="{!! route('notifications.index') !!}"><i class="fa fa-edit"></i><span>N</span></a>
</li>   

<li><li class="{{ Request::is('empls*') ? 'active' : '' }}">
    <a href="{!! route('empls.index') !!}"><i class="fa fa-edit"></i><span>Empls</span></a>
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

<li class="{{ Request::is('notifs*') ? 'active' : '' }}">
    <a href="{!! route('notifs.index') !!}"><i class="fa fa-edit"></i><span>Notifs</span></a>
</li>

<li class="{{ Request::is('statuses*') ? 'active' : '' }}">
    <a href="{!! route('statuses.index') !!}"><i class="fa fa-edit"></i><span>Statuses</span></a>
</li>

<li class="{{ Request::is('priorities*') ? 'active' : '' }}">
    <a href="{!! route('priorities.index') !!}"><i class="fa fa-edit"></i><span>priorities</span></a>
</li>

<li class="{{ Request::is('repositories*') ? 'active' : '' }}">
    <a href="{!! route('repositories.index') !!}"><i class="fa fa-edit"></i><span>repositories</span></a>
</li><li class="{{ Request::is('departaments*') ? 'active' : '' }}">
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

<li class="{{ Request::is('departamentHas*') ? 'active' : '' }}">
    <a href="{!! route('departamentHas.index') !!}"><i class="fa fa-edit"></i><span>Departament Has</span></a>
</li>

