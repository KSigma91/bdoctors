<template>
    <div class="bg-price">
        <div class="container-fluid pt-5 min-vh-100">
            <div class="px-3 py-3 pt-md-4 text-center">
                <h1 class="display-4 mb-4">Prezzi</h1>
                <h3 class="lead lh-base">
                    Sei un medico e vuoi sponsorizzarti? Compari nella homepage e durante la ricerca prima di tutti gli altri.
                    Ecco i nostri prezzi.
                </h3>
            </div>
            <div class="d-flex justify-content-center flex-wrap text-center">
                <!-- opzione 1 -->
                <div class="card bg-light shadow m-5 bg-white rounded border-0" style="max-width: 18rem; min-width: 21rem;">
                    <div class="card-header border-0">
                        <h4 class="my-0 fw-normal">Base</h4>
                    </div>
                    <div class="card-body bg-white mt-3">
                        <h2 class="card-title">2,99 &euro;
                            <small class="text-muted h3 fs-4">/ 24h</small>
                        </h2>
                        <p class="badge bg-warning bg-gradient bg-opacity-50 fw-normal text-dark">Sponsorship</p>
                        <div class="list-group list-group-flush list-unstyled mt-3 mb-4">
                            <li class="list-group-item text-start">
                                <i class="fa-solid fa-circle-check align-top me-2 fs-4" style="color: #007fbd"></i>
                                <small class="fw-light">Comparsa in HomePage</small>
                            </li>
                            <li class="list-group-item mt-2 text-start">
                                <i class="fa-solid fa-circle-check align-top me-2 fs-4" style="color: #007fbd"></i>
                                <small class="fw-light">Comparsa tra i primi risultati di ricerca</small>
                            </li>
                            <li class="list-group-item mt-3 text-secondary fst-italic fw-light fs-6">Durata abbonamento: 24 ore</li>
                        </div>
                    </div>
                </div>
                <!-- opzione 2 -->
                <div class="card bg-light shadow m-5 bg-white rounded border-0" style="max-width: 18rem; min-width: 21rem;">
                    <div class="card-header border-0" style="background: #FDBC44">
                        <h4 class="my-0 fw-normal">Avanzato</h4>
                    </div>
                    <div class="card-body bg-white mt-3">
                        <h2 class="card-title">5,99 &euro;
                            <small class="text-muted h3 fs-4">/ 72h</small>
                        </h2>
                        <p class="badge bg-warning bg-gradient bg-opacity-50 fw-normal text-dark">Sponsorship</p>
                        <div class="list-group list-group-flush list-unstyled mt-3 mb-4">
                            <li class="list-group-item text-start">
                                <i class="fa-solid fa-circle-check align-top me-2 fs-4" style="color: #007fbd"></i>
                                <small class="fw-light">Comparsa in HomePage</small>
                            </li>
                            <li class="list-group-item mt-2 text-start">
                                <i class="fa-solid fa-circle-check align-top me-2 fs-4" style="color: #007fbd"></i>
                                <small class="fw-light">Comparsa tra i primi risultati di ricerca</small>
                            </li>
                            <li class="list-group-item mt-3 text-secondary fst-italic fw-light fs-6">Durata abbonamento: 72 ore</li>
                        </div>
                    </div>
                </div>
                <!-- opzione 3 -->
                <div class="card bg-light shadow m-5 bg-white rounded border-0" style="max-width: 18rem; min-width: 21rem;">
                    <div class="card-header border-0" style="background: #19CBCE">
                        <h4 class="my-0 fw-normal">Pro</h4>
                    </div>
                    <div class="card-body bg-white mt-3">
                        <h2 class="card-title">9,99 &euro;
                            <small class="text-muted h3 fs-4">/ 144h</small>
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
                            <li class="list-group-item mt-3 text-secondary fst-italic fw-light fs-6">Durata abbonamento: 144 ore</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PagePricing',
}
</script>

<style lang="scss" scoped>
    .bg-price {
        background-image: url(../../../public/img/BDoctors_sponsor.png);
        background-size: cover;
        background-repeat: no-repeat;
    }
    // colors
    .blu-scuro {
        color: #00acff;
    }
    .blu-chiaro {
        color: #00c7ff;
    }
    .blu-chiaro2 {
        color: #8ce6ff;
    }
    .nero {
        color: #2a2d45;
    }
    .bg-blu-scuro {
        background-color: #00acff;
    }
    .bg-blu-chiaro {
        background-color: #00c7ff;
    }
    .bg-blu-chiaro2 {
        background-color: #8ce6ff;
    }
    .bg-nero {
        background-color: #2a2d45;
    }
</style>
