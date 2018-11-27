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
    <a href="{!! route('notifications.index') !!}"><i class="fa fa-edit"></i><span>Notifications</span></a>
</li>

