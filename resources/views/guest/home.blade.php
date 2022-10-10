<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BDoctors</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    {{-- Scripts --}}
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>

    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            margin: 0;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .logo {
            width: auto;
            height: 60px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <a class="navbar-brand mx-3" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }} --}}
            {{-- logo main --}}
            <img class="logo d-none d-sm-flex d-lg-flex" src="{{ asset('img/BDoctors_logo_2.svg') }}" alt="logo">
            {{-- logo responsive --}}
            <img class="logo d-flex d-sm-none d-lg-none" src="{{ asset('img/BDoctors_logo_2_resp.svg') }}" alt="logo-resp">
        </a>
        {{-- pulsante hamburger menu --}}
        <button class="navbar-toggler rounded-3 border-0 mx-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- tendina a comparsa smartphone --}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header bg-gradient text-light mb-3" style="background: #00334e">
                <h5 class="pt-2" id="offcanvasRightLabel">Menu</h5>
                <button type="button" class="btn-close bg-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <ul class="navbar-nav ml-auto flex-wrap flex-column flex-md-row flex-center align-items-start gap-2 text-start">
                <li class="links nav-item d-flex flex-column gap-4 d-md-none d-lg-none my-2 my-md-0">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('doctor.dashboard') }}" class="fw-normal">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="fw-normal">Accedi</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="fw-normal">Registrati</a>
                            @endif
                        @endauth
                    @endif
                </li>
                <li class="links nav-item my-2 my-md-0">
                    <a class="nav-link fw-normal" href="{{ url('/') }}">HOME</a>
                </li>
                <li class="links nav-item my-2 my-md-0">
                    <a class="nav-link fw-normal" href="{{ url('/search/1') }}">RICERCA AVANZATA</a>
                </li>
                <li class="links nav-item my-2 my-md-0">
                    <a class="nav-link fw-normal" href="{{ url('/pricing') }}">PREZZI</a>
                </li>
            </ul>
        </div>
        {{-- pulsanti navbar desktop --}}
        <div class="d-none d-md-block d-lg-block">
            @if (Route::has('login'))
                <div class="links mx-3">
                    @auth
                        <a href="{{ route('doctor.dashboard') }}"
                            class="btn p-2 px-3 mx-2 rounded-pill text-light fw-normal"
                            style="background: #004d73">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn p-2 px-3 mx-2 rounded-pill text-light fw-normal"
                            style="background: #004d73">Accedi</a>
                    @endauth
                </div>
            @endif
        </div>
    </nav>
    <div id="root"></div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-secondary text-light">
        {{-- upper footer  --}}
        <section class="pt-3">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        {{-- logo --}}
                        <a class="text-uppercase fw-bold mb-4" href="{{ url('/') }}">
                            <img class="logo d-sm-flex d-md-flex d-lg-flex"
                                src="{{ asset('img/BDoctors_logo_2_resp.svg') }}" alt="logo-resp">
                        </a>
                        <p class="mt-4">
                            Oltre il 99% di pazienti soddisfatti
                            <strong>BDoctors</strong> è il primo sito in Italia di prenotazioni di visite mediche ed esami diagnostici,
                            online dal 2008.
                        </p>
                    </div>
                    {{-- contatti --}}
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contatti</h6>
                        <p>
                            <i class="fa-solid fa-location-dot me-3"></i>
                            Roma, RM 00123, IT
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@bdoctors.com
                        </p>
                        <p>
                            <i class="fas fa-phone me-3"></i>
                            + 39 345 678 99
                        </p>
                        <p>
                            <i class="fas fa-print me-3"></i>
                            + 39 345 678 90
                        </p>
                    </div>
                    {{-- azienda --}}
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Azienda
                        </h6>
                        <p>
                            <a href="{{ url('/about') }}" class="text-reset">Chi siamo</a>
                        </p>
                        <p>
                            <a href="{{ url('/contacts') }}" class="text-reset">Contattaci</a>
                        </p>
                    </div>
                    {{-- link utili --}}
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            link utili
                        </h6>
                        <p>
                            <a href="{{ url('/search') }}" class="text-reset">Ricerca avanzata</a>
                        </p>
                        <p>
                            <a href="{{ url('/pricing') }}" class="text-reset">Prezzi</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- bottom footer -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            <small>© 2022 Copyright: BDoctors Tutti i diritti riservati</small>
        </div>
    </footer>
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
