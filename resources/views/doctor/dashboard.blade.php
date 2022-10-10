@extends('doctor.layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container">
        <div class="row justify-content-center text-center vh-100">
            <div class="col-sm-12 col-md-10 col-lg-7">
                <div class="card" style="border-color: #00334e">
                    <div class="card-header border-bottom bg-gradient text-light" style="background: #00334e; border-color: #00334e">
                        <big>{{ __('Dashboard') }}</big>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2>Statistiche account</h2>

                        <div>
                            <canvas class="mb-3 mt-2" id="chartMessages"></canvas>
                            <canvas id="chartReviews"></canvas>
                        </div>

                        <script>
                            const messages = @json($messages);
                            const reviews = @json($reviews);
                            const numberMessages = Object.values(messages);
                            const numberReviews = Object.values(reviews);

                            const labels = [
                                'Gennaio',
                                'Febbraio',
                                'Marzo',
                                'Aprile',
                                'Maggio',
                                'Giugno',
                                'Luglio',
                                'Agosto',
                                'Settembre',
                                'Ottobre',
                                'Novembre',
                                'Dicembre'
                            ];

                            const dataMessages = {
                                labels: labels,
                                datasets: [{
                                    label: 'Statistiche messaggi per mese',
                                    backgroundColor: '#A2CBEF',
                                    borderColor: '#A2CBEF',
                                    data: numberMessages,
                                }]
                            };

                            const dataReviews = {
                                labels: labels,
                                datasets: [{
                                    label: 'Statistiche recensioni per mese',
                                    backgroundColor: '#A3E2BD',
                                    borderColor: '#A3E2BD',
                                    data: numberReviews,
                                }]
                            };

                            const configMessages = {
                                type: 'bar',
                                data: dataMessages,
                                options: {}
                            };

                            const configReviews = {
                                type: 'bar',
                                data: dataReviews,
                                options: {}
                            };

                            const chartMessages = new Chart(
                                document.getElementById('chartMessages'),
                                configMessages
                            );

                            const chartReviews = new Chart(
                                document.getElementById('chartReviews'),
                                configReviews
                            );
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
