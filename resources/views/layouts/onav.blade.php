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
                    <h6> TEST in progress </h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="10"
                        aria-valuemin="0" aria-valuemax="100" style="width: 20%;">20%</div>
                    </div>
                </div>
            </ul>
            <!-- ROGHT OF ONAV -->
            <ul class="navbar-nav ml-auto">



                 <!-- NOTE -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Note
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="dropdown-item" href="#">remembers | +</a>
                          <a class="dropdown-item" href="#">+ add</a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="dropdown-item" href="#">to do list| +</a>
                          <a class="dropdown-item" href="#">+ add</a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="dropdown-item" href="#">automatic jobs | +</a>
                          <a class="dropdown-item" href="#">+ add</a>
                        </div>
                    </div>
                </div>
                 <!-- NOTIFICARI -->
                <div class="dropdown">
                    <button 
                        class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Notif
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{!! route('notifications.index') !!}">notifications</a>
                        <a class="dropdown-item" href="#">cerinta raportata</a>
                        <a class="dropdown-item" href="#">HppyBday</a>
                        <a class="dropdown-item" href="#">activitati team-building</a>
                    </div>
                </div>


                <!-- HR -->
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    HR
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Concediu</a>
                        <a class="dropdown-item" href="#">Salariu</a>
                    </div>
                </div>


                <!-- AUTH -->
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
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest


            </ul>
        </div>
    </div>
</nav>
{{-- @endsection --}}