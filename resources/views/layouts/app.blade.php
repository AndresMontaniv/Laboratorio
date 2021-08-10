<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laboratorios') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/6bc26732f2.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href=" {{asset('./Icons/hospital.png')}}">

    <!-- Styles -->
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm nav-bk3">
            <div class="container">
                @auth
                @php
                    $labName =  DB::table('laboratories')->select('name')->where('id',Auth::user()->laboratory_id)->first();
                    $realName = $labName->name;
                @endphp
                @endauth
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{isset($realName)? "Laboratorio ".$realName: "Laboratorio "}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('patient.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('plan.index') }}">{{ __('Planes') }}</a>
                            </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('patients.index', Auth::user()->id)}}">{{ __('Inicio') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('reservation.myReservations', Auth::user()->id)}}">{{ __('mis reservas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('analysis.myAnalyses',Auth::user()->id )}}">{{ __('mis analisis') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('proofshowall')}}">{{ __('Laboratorio Análisis') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('reservation.menu')}}">{{ __('reservar') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('campaign.index', Auth::user()->laboratory_id)}}">{{ __('campañas') }}</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
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
