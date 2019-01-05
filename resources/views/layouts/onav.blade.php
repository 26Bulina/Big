{{-- @extends('layouts.app')
@section('onav') --}}
{{-- inclus in layouts.app --}}
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'TEST') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- LEFT OF ONAV-->
            <ul class="navbar-nav mr-auto">
                <div class="well">
                    <h6> TEST1 in progress </h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100" style="width: 30%;">30%</div>
                    </div>
                </div>
            </ul>
            <!-- ROGHT OF ONAV -->
            <ul class="navbar-nav ml-auto">
                <!-- NOTE -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-clipboard-list" aria-hidden="true"></span> Notes
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="dropdown-item" href="{!! route('remembers.index') !!}">remember </a>
                            <a class="dropdown-item" href="{!! route('remembers.create') !!}"><span class="fa fa-plus" aria-hidden="true"></span></a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="dropdown-item" href="{!! route('todoLists.index') !!}"> TO DO list </a>
                            <a class="dropdown-item" href="{!! route('todoLists.create') !!}"><span class="fa fa-plus" aria-hidden="true"></span></a>
                        </div>
                    </div>
                </div>

                <!-- NOTIFICARI -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-bell fa-2x" aria-hidden="true"></span> Notificari
                        <span class="badge" style="background: #D67FFFFF; position:relative;">
                            {{ App\Models\notif::where('modif_app',1)
                            ->where('pers_create',1)
                            ->count() }}
                        </span>



                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="dropdown-item" href="{!! route('notifs.index') !!}"> notifs  </a>

                            

                           
                            <span class="badge" style="background: #4D8EB1FF; ">
                                {{  App\Models\notif::where('modif_app',1)
                                ->where('pers_create',1)
                                ->count() }}
                            </span>
                        </div>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="dropdown-item" href="{!! route('notifs.index') !!}"> update app </a>
                            <span class="badge" style="background: #4D8EB1FF; ">
                                {{  App\Models\notif::where('modif_app',1)
                                ->count() }}
                            </span>
                        </div>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="dropdown-item" href="{!! route('notifs.index') !!}"> happy team</a>
                            <span class="badge" style="background: #4D8EB1FF; ">
                                {{ App\Models\notif::where('happy_team',1)
                                ->count() }}
                            </span>
                        </div> 

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="dropdown-item" href="{!! route('notifs.index') !!}"> team work </a>
                            <span class="badge" style="background: #4D8EB1FF; ">
                                {{   App\Models\notif::where('work_team',1)
                                ->count()  }}
                            </span>
                        </div>

                    </div>
                </div>
                <!-- HR -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fa fa-user-circle" aria-hidden="true"></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{!! route('periodcos.index') !!}"> CO </a>
                        <a class="dropdown-item" href="#">Profil</a>
                    </div>
                </div>
                <!-- AUTH -->
                <div>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{csrf_field() }}
                            </form>
                        </div>
                    </li>
                    @endguest
                </div>
            </ul>
            
        </div>
    </div>
</nav>
{{-- @endsection --}}