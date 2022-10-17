@extends('doctor.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center flex-wrap">
        <div class="col-sm-11 col-md-10 col-lg-12">
            <div class="p-3">
                <h2 class="p-3 text-center display-4 fs-2">Sponsorizzazioni</h2>
                <div class="text-center p-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($user !== 0)
                        <big class="fs-4">La tua sponsorizzazione terminerà il {{$user[0]->sponsorships[0]->pivot->ending_date}}</big>
                    @else
                        <!-- abbonamenti -->
                        <div class="d-flex flex-wrap justify-content-center text-center w-100">
                            @foreach ($sponsorships as $sponsorship)
                                <div class="card bg-light border-0 shadow m-4 bg-white rounded" style="max-width: 18rem; min-width: 21rem;">
                                    @if ($sponsorship->id == 1)
                                        <div class="card-header border-0">
                                            <h4 class="my-0 fw-normal">Base</h4>
                                        </div>
                                    @elseif ($sponsorship->id == 2)
                                        <div class="card-header border-0" style="background: #FDBC44">
                                            <h4 class="my-0 fw-normal">Avanzato</h4>
                                        </div>
                                    @else
                                        <div class="card-header border-0" style="background: #19CBCE">
                                            <h4 class="my-0 fw-normal">Pro</h4>
                                        </div>
                                    @endif
                                    <div class="card-body bg-white mt-3">
                                        <h2 class="card-title">
                                            {{$sponsorship->price}} <small>&euro;</small>
                                            <small class="text-muted h3 fs-4">/ {{$sponsorship->time}}h</small>
                                        </h2>
                                        <span class="badge bg-warning bg-gradient bg-opacity-50 fw-normal text-dark">Sponsorship</span>
                                        <div class="list-group list-group-flush list-unstyled mt-3 mb-4">
                                            <li class="list-group-item text-start">
                                                <i class="fa-solid fa-circle-check align-top me-2 fs-4" style="color: #007fbd"></i>
                                                <small class="fw-light">Comparsa in HomePage</small>
                                            </li>
                                            <li class="list-group-item mt-2 text-start">
                                                <i class="fa-solid fa-circle-check align-top me-2 fs-4" style="color: #007fbd"></i>
                                                <small class="fw-light">Comparsa tra i primi risultati di ricerca</small>
                                            </li>
                                            <li class="list-group-item mt-3 text-secondary fst-italic fw-light fs-6">Durata abbonamento: {{$sponsorship->time}} ore</li>
                                        </div>
                                        <a href="{{ route('doctor.sponsorships.show', ['sponsorship' => $sponsorship->id]) }}"
                                        class="btn bg-secondary bg-gradient rounded-pill border-0 p-2 px-3 text-light shadow-sm" style="font-weight: 500">
                                            Abbonati
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
