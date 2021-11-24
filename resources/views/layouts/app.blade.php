<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
</head>
<body>
    <div id="app">
                 <!-- mi Navbar -->
          <nav class="mb-4 navbar navbar-expand-lg navbar-dark bg-unique">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                            
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                 <a class="nav-link" href="{{url('/operadores/index')}}">Operadores<span class="sr-only"></span></a>
                                </li>
                                <li class="nav-item">
                                 <a class="nav-link" href="{{url('/tipos/index')}}">Tipos</a>
                                </li> 
                                <li class="nav-item">
                                 <a class="nav-link" href="{{url('/ordenes/index')}}">Ordenes</a>
                                </li> 
                                <li class="nav-item">
                                 <a class="nav-link" href="{{url('/ordenes/index')}}">Ordenes</a>
                                </li>

                            </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
