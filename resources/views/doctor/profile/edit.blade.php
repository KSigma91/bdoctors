@extends('doctor.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-11 col-md-10 col-lg-10">
            <div class="card border-primary">
                <div class="card-header bg-primary bg-gradient bg-opacity-50 border-bottom border-primary"><big>{{ __('Modifica Profilo') }}</big></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('doctor.profile.update', ['profile' => $user]) }}" method="post" id="form-edit" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label class="form-label" for="name">Nome*</label>
                            <input class="form-control w-75 @error('name') is-invalid @enderror"
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $user->name) }}"
                                required autocomplete="name" autofocus
                            >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="lastname">Cognome*</label>
                            <input class="form-control w-75 @error('lastname') is-invalid @enderror"
                                type="text"
                                name="lastname"
                                id="lastname"
                                value="{{ old('lastname', $user->lastname) }}"
                                required autocomplete="lastname" autofocus
                            >
                            @error('lastname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email*</label>
                            <input class="form-control w-75 @error('email') is-invalid @enderror"
                                type="text"
                                name="email"
                                id="email"
                                value="{{ old('email', $user->email) }}"
                                required autocomplete="email" autofocus
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="photo">Photo</label>
                            <input class="form-control w-75 @error('photo') is-invalid @enderror"
                                type="file"
                                name="photo"
                                id="photo"
                                accept="image/*"
                                value="{{ old('photo', $user->photo) }}"
                                autofocus
                            >
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            @if ($user->photo != null)
                                <img id="preview" class="img-fluid rounded-circle my-3" src="{{ asset('storage/' . $user->photo) }}">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="phone">Numero di telefono</label>
                            <input class="form-control w-75 @error('phone') is-invalid @enderror"
                                type="text"
                                name="phone"
                                id="phone"
                                value="{{ old('phone', $user->phone) }}"
                                autocomplete="phone" autofocus
                            >
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="service">Servizi*</label>
                            <input class="form-control w-75 @error('service') is-invalid @enderror"
                                type="text"
                                name="service"
                                id="service"
                                value="{{ old('service', $user->service) }}"
                                required autofocus
                            >
                            @error('service')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="address">Via*</label>
                            <input class="form-control w-75 @error('address') is-invalid @enderror"
                                type="text"
                                name="address"
                                id="address"
                                value="{{ old('address', $user->address) }}"
                                required autocomplete="address" autofocus
                            >
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="city">Città*</label>
                            <input class="form-control w-75 @error('city') is-invalid @enderror"
                                type="text"
                                name="city"
                                id="city"
                                value="{{ old('city', $user->city) }}"
                                required autocomplete="city" autofocus
                            >
                            @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="postal_code">Codice Postale*</label>
                            <input class="form-control w-75 @error('postal_code') is-invalid @enderror"
                                type="text"
                                name="postal_code"
                                id="postal_code"
                                value="{{ old('postal_code', $user->postal_code) }}"
                                required autocomplete="postal_code" autofocus
                            >
                            @error('postal_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="cv">CV*</label>
                            <textarea class="form-control @error('cv') is-invalid @enderror" name="cv" id="cv" autofocus>{{ old('cv', $user->cv) }}</textarea>
                            @error('cv')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <fieldset class="mb-3" id="mySpecialization">
                            <legend class="col-md-4 col-form-label text-md-right">{{ __('Specializzazioni*') }}</legend>
                            @foreach ($specializations as $specialization)
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="specializations[]"
                                        value="{{ $specialization->id }}"
                                        id="specialization-{{ $specialization->id }}"
                                        @if(in_array($specialization->id, old('specializations', $user->specializations->pluck('id')->all()) ?: [])) checked @endif
                                    >
                                    <label class="form-check-label" for="specialization-{{ $specialization->id }}">{{ $specialization->name }}</label>
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
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary bg-gradient text-light rounded-pill">Salva</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</div>
@endsection
