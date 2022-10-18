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
    <!-- Styles -->
    <link href="{{ asset('css/back.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div id="app" style="background: #F5F5F5">
        <main class="d-flex">
            <section class="left-menu d-flex justify-content-center">
                <div class="left-menu-color d-flex flex-column flex-shrink-0 align-items-center">
                    <a class="navbar-brand d-flex justify-content-center" href="{{ url('/') }}">
                        {{-- logo main --}}
                        <img class="logo d-none d-sm-flex d-lg-flex ps-4" src="{{ asset('img/BDoctors_logo_back.svg') }}" alt="logo" style="width: 200px; height: 60px">
                        {{-- logo responsive --}}
                        <img class="logo d-flex d-sm-none d-lg-none" src="{{ asset('img/BDoctors_logo_2_resp.svg') }}" alt="logo-resp" style="width: 200px; padding: 12px">
                    </a>
                    {{-- <hr class="w-100 m-0 text-secondary"> --}}
                    <button class="btn d-none d-md-block d-lg-block py-3 border-0 border-top border-secondary rounded-0 fw-bold text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Dr. {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                        <i class="fas fa-chevron-down align-middle ms-1" style="font-size: .6rem"></i>
                    </button>
                    <ul class="collapse list-unstyled text-white" id="collapseExample">
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
                                <a class="nav-link mb-3" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="links nav-item my-md-0">
                                <a class="nav-link mb-3" href="{{ route('doctor.sponsorships.index') }}">{{ __('I tuoi abbonamenti') }}</a>
                            </li>
                            <li class="links nav-item my-md-0">
                                <a class="nav-link" href="{{ route('logout') }}" class="nav-link"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Esci') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        @endguest
                    </ul>
                    <ul class="nav nav-pills mb-auto d-flex flex-column align-content-center gap-2 border-top border-secondary w-100 pt-3">
                        <li class="side-nav-li">
                            <a href="{{ route('doctor.dashboard') }}" class="nav-link link-light d-flex align-items-baseline" aria-current="page">
                                <i class="fa-solid fa-house-user fs-5 my-auto"></i>
                                <span class="d-none d-sm-block d-lg-block my-auto ms-3">Dashboard</span>
                            </a>
                        </li>
                        <li class="side-nav-li">
                            <a href="{{ route('doctor.profile.edit', ['profile' => Auth::id()]) }}" class="nav-link link-light d-flex align-items-baseline">
                                <i class="fa-solid fa-pen fs-5 my-auto"></i>
                                <span class="d-none d-sm-block d-lg-block my-auto ms-3 col-sm-12">Modifica Profilo</span>
                            </a>
                        </li>
                        <li class="side-nav-li">
                            <a href="{{ route('doctor.profile.show', ['profile' => Auth::id()]) }}" class="nav-link link-light d-flex align-items-baseline">
                                <i class="fa-solid fa-eye fs-5 my-auto"></i>
                                <span class="d-none d-sm-block d-lg-block my-auto ms-3 col-12">Visualizza Profilo</span>
                            </a>
                        </li>
                        <li class="side-nav-li">
                            <a href="{{ route('doctor.messages.index') }}" class="nav-link link-light d-flex align-items-baseline" style="margin-left: 1px">
                                <i class="fa-solid fa-envelope fs-5 my-auto"></i>
                                <span class="d-none d-sm-block d-lg-block my-auto ms-3">Messaggi</span>
                            </a>
                        </li>
                        <li class="side-nav-li">
                            <a href="{{ route('doctor.reviews.index') }}" class="nav-link link-light d-flex align-items-baseline">
                                <i class="fa-solid fa-users fs-5 my-auto"></i>
                                <span class="d-none d-sm-block d-lg-block my-auto ms-3">Recensioni</span>
                            </a>
                        </li>
                        <li class="side-nav-li">
                            <a href="{{ route('doctor.sponsorships.index') }}" class="nav-link link-light d-flex align-items-baseline">
                                <i class="fa-solid fa-cart-shopping fs-5 my-auto"></i>
                                <span class="d-none d-sm-block d-lg-block my-auto ms-3">Sponsorizzazioni</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="right-content my-4">
                <div class="d-flex justify-content-end">
                    <button class="dropdown-toggle d-md-none d-lg-none btn btn-outline-secondary rounded-pill mb-4 me-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Dr. {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                    </button>
                    {{-- menu card --}}
                    <ul class="dropdown-menu border-0 px-3 shadow" aria-labelledby="dropdownMenuButton1">
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
                                <a class="nav-link mb-3" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="links nav-item my-md-0">
                                <a class="nav-link mb-3" href="{{ route('doctor.sponsorships.index') }}">{{ __('I tuoi abbonamenti') }}</a>
                            </li>
                            <li class="links nav-item my-md-0">
                                <a class="nav-link" href="{{ route('logout') }}" class="nav-link"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Esci') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>

                @yield('content')
            </section>
        </main>
    </div>
</body>
</html>
