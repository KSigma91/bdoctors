@extends('doctor.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($messages as $message)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-primary bg-gradient bg-opacity-50 border-0 d-flex flex-wrap justify-content-between fst-italic">
                        <span>{{ __('Messaggio inviato da: ') . $message->email }}</span>
                        {{ __('il ') . $message->date }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="p-0">
                            <li class="list-unstyled">{{$message->message}}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
