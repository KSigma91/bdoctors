@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-11 col-md-10 col-lg-10">
                <div class="card border-primary">
                    <div class="card-header bg-primary bg-gradient bg-opacity-50 border-primary">
                        <big>{{ __('Registrazione') }}</big>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="form-register">
                            @csrf

                            <div class="form-group row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="lastname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognome*') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Via*') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Citta*') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                        class="form-control @error('city') is-invalid @enderror" name="city"
                                        value="{{ old('city') }}" required autocomplete="city" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="postal_code"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Codice Postale*') }}</label>

                                <div class="col-md-6">
                                    <input id="postal_code" type="text"
                                        class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                                        value="{{ old('postal_code') }}" required autocomplete="postal_code" autofocus>

                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <fieldset class="mb-3" id="mySpecialization">
                                <legend class="col-md-4 col-form-label text-md-right">{{ __('Specializzazioni*') }}
                                </legend>
                                @foreach ($specializations as $specialization)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="specializations[]"
                                            value="{{ $specialization->id }}"
                                            id="specialization-{{ $specialization->id }}"
                                            @if (in_array($specialization->id, old('specializations') ?: [])) checked @endif>
                                        <label class="form-check-label"
                                            for="specialization-{{ $specialization->id }}">{{ $specialization->name }}</label>
                                    </div>
                                @endforeach

                                @foreach ($errors->get('specializations.*') as $messages)
                                    @foreach ($messages as $message)
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endforeach
                            </fieldset>

                            <div class="form-group row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="d-flex justify-content-end col-md-12 mt-4">
                                    <button type="submit" value="Submit"
                                        class="btn btn-primary bg-gradient rounded-pill text-light">
                                        {{ __('Completa registrazione') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </div>
@endsection
