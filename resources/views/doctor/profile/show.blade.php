@extends('doctor.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-11 col-md-10 col-lg-10">
            <div class="card p-2 border-0 shadow-sm">
                <div class="card-header bg-white border-0 mt-2">
                    <big class="display-4 fs-4">{{ __('Il tuo Profilo') }}</big>
                    @if ($user->photo != null)
                        <div class="position-relative">
                            <img id="preview" class="img-fluid rounded-2 my-4 shadow-sm" src="{{ asset('storage/' . $user->photo) }}">
                            <div class="position-absolute bottom-0 end-0 translate-middle-y m-2 me-3 bg-white bg-opacity-50 p-3 rounded-1">
                                <big class="display-4 fs-3" style="color: #007fbd">{{ $user->name }} {{ $user->lastname }}</big>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex flex-wrap flex-column flex-md-column flex-lg-row justify-content-center my-4">
                        <ul class="text-secondary list-unstyled mx-5">
                            <li class="mb-1" style="color: #23A3B3">
                                <i class="fa-regular fa-envelope me-1" style="color: #23A3B3"></i>
                                <span class="text-dark" style="font-weight: 500">Email:</span>
                                {{ $user->email}}
                            </li>
                            <li class="mb-1" style="color: #23A3B3">
                                <i class="fa-solid fa-location-dot me-1" style="color: #23A3B3"></i>
                                <span class="text-dark" style="font-weight: 500">Via:</span>
                                {{ $user->address}}
                            </li>
                            <li class="mb-1">
                                <i class="fa-regular fa-building me-1" style="color: #23A3B3"></i>
                                <span class="text-dark" style="font-weight: 500">Città:</span>
                                {{ $user->city}}, {{ $user->postal_code}}
                            </li>
                            <li class="mb-1">
                                <i class="fa-solid fa-stethoscope" style="color: #23A3B3"></i>
                                <strong class="text-dark" style="font-weight: 500">Servizi:</strong>
                                {{ $user->service}}
                            </li>
                        </ul>
                        <div class="text-secondary mx-5">
                            <div>
                                <i class="fa-regular fa-hospital me-1" style="color: #23A3B3"></i>
                                <span class="text-dark" style="font-weight: 500">Specializzazioni:</span>
                            </div>
                            @foreach ($user->specializations as $specialization)
                                <div class="list-unstyled text-secondary">- {{ $specialization->name }}</div>
                            @endforeach
                        </div>
                    </div>
                    <hr class="text-secondary">
                    <div class="col-12">
                        <h4 class="text-center display-4 fw-normal fs-5">Curriculum</h4> {{ $user->cv}}
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-danger bg-gradient rounded-pill mt-4 text-light border-0" id="delete-js">Elimina profilo</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-delete d-none">
                <form data-action="{{ route('doctor.profile.destroy', ['profile' => $user]) }}" method="post" class="popup p-3">
                    @csrf
                    @method('DELETE')

                    <label for="password" class="col-form-label text-md-right">Inserisci la tua password per eliminare il tuo profilo</label>
                    <input id="password" type="password" class="form-control mb-3" name="password" required autocomplete="current-password">
                    <button type="submit" class="btn btn-danger bg-gradient rounded-pill border-0 text-light">
                        Conferma
                    </button>
                    <button id="cancel-btn" type="button" class="btn btn-secondary bg-gradient rounded-pill border-0 mx-2">
                        Annulla
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
