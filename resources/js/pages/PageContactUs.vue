<template>
    <div class="container mt-5 min-vh-100">
        <section class="mb-4">
            <h2 class="h1-responsive font-weight-bold text-center my-4">Contattaci</h2>
            <p class="text-center w-responsive mx-auto mb-5">Hai qualche domanda? Non esitare a contattarci direttamente. Il nostro team ti ricontattera per aiutarti al meglio.</p>

            <div class="row">
                <div class="col-md-9 mb-md-0 mb-5">
                    <form>
                        <div class="row">
                            <!-- campo nome  -->
                            <div class="col-md-6 mt-3">
                                <div class="md-form mb-0">
                                    <input type="text" class="form-control" placeholder="Il tuo nome...">
                                </div>
                            </div>
                            <!-- campo email -->
                            <div class="col-md-6 mt-3">
                                <div class="md-form mb-0">
                                    <input type="text" class="form-control" placeholder="La tua email...">
                                </div>
                            </div>
                        </div>
                        <!-- campo oggetto  -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" class="form-control" placeholder="Ogetto...">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea type="text" rows="6" class="form-control md-textarea" placeholder="Scrivi messaggio..."></textarea>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="text-center text-md-left mt-3">
                        <a class="btn btn-primary bg-gradient rounded-pill">Invia</a>
                    </div>
                </div>

                <!-- sezioe laterale -->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>Roma, RM 00123, IT</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+ 39 345 678 99</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>contact@bdoctors.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>

        </section>
        <!--Section: Contact v.2-->
    </div>
</template>

<script>

export default {
    name: 'PageContactUs',

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
