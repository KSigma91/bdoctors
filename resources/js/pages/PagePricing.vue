<template>
    <div class="container mt-5 min-vh-100">
        <div class="px-3 py-3 pt-md-4 text-center">
            <h1 class="display-4 mb-4">Prezzi</h1>
            <h3 class="lead lh-base">
                Sei un medico e vuoi sponsorizzarti? Compari nella homepage e durante la ricerca prima di tutti gli altri.
                Ecco i nostri prezzi.
            </h3>
        </div>
        <div class="d-flex justify-content-center flex-wrap text-center">
            <!-- opzione 1 -->
            <div class="card bg-light shadow m-5 bg-white rounded" style="max-width: 18rem; min-width: 18rem;">
                <div class="card-header">
                    <h4 class="my-0">Base</h4>
                </div>
                <div class="card-body bg-white">
                    <h1 class="card-title">€2,99
                        <small class="text-muted h3">/ 24h</small>
                    </h1>
                    <p class="card-text">Sponsorship</p>
                    <div class="list-unstyled mt-3 mb-4">
                            <li>Comparsa in HomePage</li>
                            <li class="mt-2">Comparsa tra i primi risultati di ricerca</li>
                            <li class="mt-2">Durata vantaggi: 24 ore</li>
                        </div>
                </div>
            </div>
            <!-- opzione 2 -->
            <div class="card bg-light shadow m-5 bg-white rounded" style="max-width: 18rem; min-width: 18rem;">
                <div class="card-header" style="background: #FDBC44">
                    <h4 class="my-0">Avanzato</h4>
                </div>
                <div class="card-body bg-white">
                    <h1 class="card-title">€5,99
                        <small class="text-muted h3">/ 72h</small>
                    </h1>
                    <p class="card-text">Sponsorship</p>
                    <div class="list-unstyled mt-3 mb-4">
                        <li>Comparsa in HomePage</li>
                        <li class="mt-2">Comparsa tra i primi risultati di ricerca</li>
                        <li class="mt-2">Durata vantaggi: 72 ore</li>
                    </div>
                </div>
            </div>
            <!-- opzione 3 -->
            <div class="card bg-light shadow m-5 bg-white rounded" style="max-width: 18rem; min-width: 18rem;">
                <div class="card-header" style="background: #19CBCE">
                    <h4 class="my-0">Pro</h4>
                </div>
                <div class="card-body bg-white">
                    <h1 class="card-title">€9,99
                        <small class="text-muted h3">/ 144h</small>
                    </h1>
                    <p class="card-text">Sponsorship</p>
                    <div class="list-unstyled mt-3 mb-4">
                        <li>Comparsa in HomePage</li>
                        <li class="mt-2">Comparsa tra i primi risultati di ricerca</li>
                        <li class="mt-2">Durata vantaggi: 144 ore</li>
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
