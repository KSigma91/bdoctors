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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/back.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
            {{-- pulsante menu desktop --}}
            <div class="btn-group dropstart d-none d-md-block d-lg-block mx-3">
                <button class="btn btn-outline-secondary rounded-pill dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Dr. {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                </button>
                {{-- menu card --}}
                <ul class="dropdown-menu px-3" aria-labelledby="dropdownMenuButton1">
                    @guest
                        <li class="links nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="links nav-item">
                                <a class="nav-link mb-3" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="links nav-item my-md-0">
                            <a class="nav-link mb-3" href="{{ route('home') }}">{{ __('HOME') }}</a>
                        </li>
                        <li class="links nav-item my-md-0">
                            <a class="nav-link mb-3" href="{{ route('doctor.sponsorships.index') }}">{{ __('I TUOI ABBONAMENTI') }}</a>
                        </li>
                        <li class="links nav-item my-md-0">
                            <a class="nav-link" href="{{ route('logout') }}" class="nav-link"
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

            {{-- pulsante hamburger menu --}}
            <button class="navbar-toggler rounded-3 border-0 mx-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- tendina a comparsa smartphone --}}
            <div class="offcanvas offcanvas-end bg-gradient d-md-none d-lg-none" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="background: #004d73">
                <div class="offcanvas-header d-flex align-items-center text-light mb-3">
                    <h4 class="pt-2" id="offcanvasRightLabel">Dr {{ Auth::user()->name }} {{ Auth::user()->lastname }}</h4>
                    <button type="button" class="btn-close bg-white text-reset fs-5 d-block d-md-none d-lg-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <ul class="navbar-nav ml-auto mx-4 text-start">
                    @guest
                        <li class="links nav-item my-2">
                            <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="links nav-item my-2">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
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

        <main class="d-flex">
            <section class="left-menu d-flex justify-content-center">
                <div class="d-flex flex-shrink-0 mt-3" >
                    <ul class="nav nav-pills mb-auto d-flex flex-column align-content-center">
                      <li class="side-nav-li my-1">
                        <a href="{{ route('doctor.dashboard') }}" class="nav-link link-dark d-flex align-items-baseline" aria-current="page">
                          <i class="fa-solid fa-house-user fs-5 my-auto"></i>
                          <span class="d-none d-sm-block d-lg-block my-auto ms-2">Dashboard</span>
                        </a>
                      </li>
                      <li class="side-nav-li my-1">
                        <a href="{{ route('doctor.profile.edit', ['profile' => Auth::id()]) }}" class="nav-link link-dark d-flex align-items-baseline">
                          <i class="fa-solid fa-pen fs-5 my-auto"></i>
                          <span class="d-none d-sm-block d-lg-block my-auto ms-2 col-sm-12">Modifica Profilo</span>
                        </a>
                      </li>
                      <li class="side-nav-li my-1">
                        <a href="{{ route('doctor.profile.show', ['profile' => Auth::id()]) }}" class="nav-link link-dark d-flex align-items-baseline">
                          <i class="fa-solid fa-eye fs-5 my-auto"></i>
                          <span class="d-none d-sm-block d-lg-block my-auto ms-2 col-12">Visualizza Profilo</span>
                        </a>
                      </li>
                      <li class="side-nav-li my-1">
                        <a href="{{ route('doctor.messages.index') }}" class="nav-link link-dark d-flex align-items-baseline">
                          <i class="fa-solid fa-envelope fs-5 my-auto"></i>
                          <span class="d-none d-sm-block d-lg-block my-auto ms-2">Messaggi</span>
                        </a>
                      </li>
                      <li class="side-nav-li my-1">
                        <a href="{{ route('doctor.reviews.index') }}" class="nav-link link-dark d-flex align-items-baseline">
                            <i class="fa-solid fa-users fs-5 my-auto"></i>
                            <span class="d-none d-sm-block d-lg-block my-auto ms-2">Recensioni</span>
                        </a>
                      </li>
                      <li class="side-nav-li my-1">
                        <a href="{{ route('doctor.sponsorships.index') }}" class="nav-link link-dark d-flex align-items-baseline">
                          <i class="fa-solid fa-cart-shopping fs-5 my-auto"></i>
                          <span class="d-none d-sm-block d-lg-block my-auto ms-2">Sponsorizzazioni</span>
                        </a>
                      </li>
                    </ul>
                  </div>
            </section>
            <section class="right-content my-4">
                @yield('content')
            </section>

        </main>
    </div>
</body>
</html>
