@extends('doctor.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($messages as $message)
                <div class="message-card card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-white border-0 d-flex flex-wrap justify-content-between fst-italic">
                        <span class="text-secondary">{{ __('Messaggio inviato da: ') }} <b class="text-dark opacity-75 fst-normal">{{ $message->email }}</b></span>
                        <span class="text-secondary"><i class="far fa-calendar-alt mx-2 align-text-top"></i>{{ __('il ') . $message->date }}</span>
                    </div>
                    <hr class="m-auto" style="width: 97%; color: #00334e">
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
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="position-absolute top-100 start-50 translate-middle mt-1 bi bi-caret-down-fill shadow-sm" style="filter: invert(100%)" fill="#212529" xmlns="http://www.w3.org/2000/svg"><path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
