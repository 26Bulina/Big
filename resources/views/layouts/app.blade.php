<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      {{-- link-uri --}}
        {{-- {!! Charts::assets() !!} --}}
        <!-- Fonts -->
        {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> --}}
        {{-- <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"> --}}
        
        {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        {{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> --}}
        {{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}

    </head>
    
    <body>
        @include('layouts/onav')
        <div class="container-fluid">
            {{-- <div class="row justify-content-center "> --}}
            <div class="row ">
                <div class="col-3">
                <nav class="navbar navbar-expand-sm navbar-light navbar-laravel">
                        <button class="navbar-toggler" type="button"
                            data-toggle="collapse" data-target="#mm"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="true"
                            aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="mm">
                            <div class="padd list-group   ">
                                @auth
                                @include('layouts/menu')
                                @endauth
                            </div>
                    </div>
                </nav>
                </div>
                <div class="col-9">
                            <div class="panel panel-fluid">
                                <main >
                                    {{-- <img src="{{url('/storage/app/public/logo3.jpg')}}">
                                    <img src="{{ URL::to('/storage/app/logo3.jpg') }}">
                                    <img src="{{ asset('/storage/app/logo3.jpg')}}" alt=".">
                                    {{ asset('/storage/app/logo3.jpg') }} --}}
                                    @yield('content')
                                </main>
                            </div>
                </div>
            </div>
        </div>
        <div class="container">    
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        <footer class="panel-footer" >
                            <p>Copyright BigT, &copy; 2019</p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>