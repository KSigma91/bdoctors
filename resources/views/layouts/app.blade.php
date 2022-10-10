<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/back.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/back.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm d-flex justify-content-between">
            <a class="navbar-brand mx-3" href="{{ url('/') }}">
                {{-- {{ config('app.name', 'Laravel') }} --}}
                {{-- logo main --}}
                <img class="logo d-none d-sm-flex d-lg-flex" src="{{ asset('img/BDoctors_logo_2.svg') }}" alt="logo">
                {{-- logo responsive --}}
                <img class="logo d-flex d-sm-none d-lg-none" src="{{ asset('img/BDoctors_logo_2_resp.svg') }}" alt="logo-resp">
            </a>
            {{-- menu desktop --}}
            <div class="d-none d-md-block d-lg-block mt-3 mx-3">
                <ul class="d-flex gap-4 list-unstyled">
                    @guest
                        @if (Route::has('login'))
                            <li class="links nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Hai già un account? <span class="btn btn-outline-secondary rounded-pill p-1 px-3 ms-1">{{ __('Accedi') }}</span></a>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>

            {{-- pulsante hamburger menu --}}
            <button class="navbar-toggler rounded-3 border-0 mx-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- tendina a comparsa smartphone --}}
            <div class="offcanvas offcanvas-end bg-gradient d-md-none d-lg-none" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="background: #004d73">
                <div class="offcanvas-header d-flex align-items-center text-light mb-3">
                    <h4 class="pt-2" id="offcanvasRightLabel">BDoctors ti da il benvenuto</h4>
                    <button type="button" class="btn-close bg-white text-reset fs-5 d-block d-md-none d-lg-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <ul class="navbar-nav ml-auto mx-4 text-start">
                    @guest
                        @if (Route::has('login'))
                            <li class="links nav-item my-2">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('ACCEDI') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="links nav-item my-2">
                                <a class="nav-link text-light" href="{{ route('register') }}">{{ __('REGISTRATI') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="links nav-item my-2 my-md-0">
                            <a class="nav-link text-light" href="{{ route('home') }}">{{ __('HOME') }}</a>
                        </li>
                        <li class="links nav-item my-2 my-md-0">
                            <a class="nav-link text-light" href="{{ route('doctor.sponsorships.index') }}">{{ __('I TUOI ABBONAMENTI') }}</a>
                        </li>
                        <li class="links nav-item my-2 my-md-0">
                            <a class="nav-link text-light" href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('ESCI') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>





