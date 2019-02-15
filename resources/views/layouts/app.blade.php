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
        {{-- <script src="{{ asset('js/tinymce.min.js') }}"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet"> --}}

<script src="{{ asset ('/vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset ('/vendor/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{ asset ('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset ('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>



{{-- <script src="{{ asset('/js/tinymce/js/tinymce/tinymce.min.js') }}" defer></script>
<script src="{{ asset('/js/tinymce/js/tinymce/jquery.tinymce.min.js') }}" defer></script> --}}


{{-- <script src="{{ asset('js/tinymce.min.js') }}" defer></script> --}}
{{-- <script src="{{ asset('resources/js/jquery.tinymce.min.js') }}" defer></script> --}}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
{{-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script> --}}
<script>tinymce.init({ selector:'textarea' });</script>


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>



 {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" /> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> --}}


      {{-- link-uri --}}
        {{-- {!! Charts::assets() !!} --}}
        <!-- Fonts -->
        {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

        {{-- <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> --}}
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"> --}}
        
        {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
        {{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> --}}
        {{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}

    </head>
    {{-- style="background-image: linear-gradient(#3573BE58, #FFFFFFFF)" --}}
    <body >
        @include('layouts/onav')
        <div class="container-fluid">
            {{-- <div class="row justify-content-center "> --}}
            <div class="row ">
                <div class="col-2 offset-1" style="padding-right: 0px">
                <nav class="navbar navbar-expand-sm navbar-light navbar-laravel">
                        <button class="navbar-toggler" type="button"
                            data-toggle="collapse" data-target="#mm"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="true"
                            aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="mm" >
                            {{-- <div   "> --}}
                                @auth
                                @include('layouts/menu')
                                @endauth
                            {{-- </div> --}}
                    </div>
                </nav>
                </div>
                <div class="col-8">
                            {{-- <div class="panel panel-fluid"> --}}
                            <main >
                                {{-- <img src="{{url('/storage/app/public/logo3.jpg')}}">
                                <img src="{{ URL::to('/storage/app/logo3.jpg') }}">
                                <img src="{{ asset('/storage/app/logo3.jpg')}}" alt=".">
                                {{ asset('/storage/app/logo3.jpg') }} --}}
                                @yield('content')
                            </main>
                            {{-- </div> --}}
                </div>
            </div>
        </div>
      <!-- Footer -->
      <footer class="footer" >
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
          </div>
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="/" class="font-weight-bold ml-1" target="_blank"> BigT </a>
            </div>
          </div>
        </div>
      </footer>


    </body>

<script>
    $(document).ready(function() {

           $('#technig').summernote({

             height:300,

           });

       });
</script>
</html>