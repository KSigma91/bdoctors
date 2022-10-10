@extends('doctor.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-11 col-md-10 col-lg-10">
            <div class="card" style="border-color: #00334e">
                <div class="card-header bg-gradient text-light" style="background: #00334e; border-color: #00334e">{{ __('Sponsorizzazioni') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="sponsorship"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.user = @json(Auth::user()->id);
    window.sponsorship = @json($sponsorship->id);
</script>
<script src="{{ asset('js/payment.js') }}"></script>
@endsection
