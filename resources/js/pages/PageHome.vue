<template>
    <div>
        <!-- jumbotron -->
        <div class="container-jumbo">
            <img src="img/jumbotron-2.jpg" alt="jumbotron" class="img-fluid" id="jumbotron">

            <div class="cont-jumbo col-12 col-md-6 col-lg-5 ps-1 ps-sm-2 ps-md-5 ps-lg-0">
                <h1 class="title-jumbo text-wrap mb-3">
                    Il tuo specialista a portata di click!
                </h1>
                <!-- searchbar -->
                <div class="cont-searchbar">
                    <form class="d-flex justify-content-center form-inputs my-2 my-lg-0" id="form">
                        <input v-model="search" class="form-control bg-white border-0 rounded-pill mr-sm-2 p-2" type="search"
                            placeholder="Scrivi qui.." aria-label="Search" @input="searchInput"
                            @click="displayComponent" @keyup="displayComponent">
                        <router-link :to="{name: 'AdvanceSearch', params: {specialization: mySpecialization.id.toString()} }"
                            id="search-button">
                            <img class="search-icon" src="img/BDoctors_lens_search.svg" alt="lens-search">
                        </router-link>
                    </form>
                    <div class="collapse position-absolute d-flex my-collapse" v-if="display"
                        @mouseleave="handleFocusOut">
                        <ul class="card overflow-auto my-overflow">
                            <li v-for="specialization in specializations" :key="specialization.id"
                                @click="selectSpecialization(specialization)">
                                {{ specialization.name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-jumbo">

            </div>
            <div class="wave_container">
                <img src="img/Wave-1.png" alt="">
            </div>
        </div>

        <!-- schede dottori -->
        <div class="container">
            <div class="mt-5">
                <div class="text-center my-3">
                    <big class="display-4 fs-2" style="color: #00334e">
                        MEDICI SPONSORIZZATI
                    </big>
                </div>
                <div class="d-flex flex-wrap justify-content-center gap-4 my-5">
                    <!-- card singolo dottore -->
                    <CardDoctor v-for="doctor in doctors" :key="doctor.id" :doctor="doctor" />
                </div>
            </div>
        </div>

        <div class="full-container mt-5">
            <div class="wave pb-5 pb-sm-5 pb-md-0 pb-lg-0">
                <img src="img/wave.svg" alt="">
            </div>
            <div class="container mt-5 text-center">
                <big class="fs-1">
                    PERCH?? SCEGLIERCI
                </big>
                <div class="col-12 d-flex align-items-center flex-wrap">
                    <div class="col-md-6 col-sm-12">
                        <h4 class="mt-3">Incontra un Dottore ovunque tu sia</h4>
                        <p class="lh-lg my-3">
                            Una soluzione per richiedere una consulenza medica, direttamente da casa tua, con il tuo
                            smartphone o PC.
                            Utili per una seconda opinione, per l'esame di un referto, per un colloquio preliminare a
                            una visita, o per avere pi?? informazioni su una possibile patologia.
                            I Videoconsulti, disponibili su BDoctors gi?? dal 2019, sono uno strumento utilizzato da
                            molti medici per facilitare l'attivit?? professionale e il follow-up del paziente.
                        </p>
                        <h4>Con BDoctor:</h4>
                        <div class="my-list lh-lg">
                            <ul>
                                <li>Ricevi prenotazioni da nuovi pazienti</li>
                                <li>Migliori la tua visibilit?? e la tua reputazione online</li>
                                <li>Organizzi al meglio il tuo lavoro con una suite completa di strumenti dedicati al
                                    Medico</li>
                                <li>Puoi usare la nostra App multipiattaforma dedicata ai Medici</li>
                                <li>Hai il nostro staff sempre disponibile ad aiutarti</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-10 col-md-6 col-sm-12 m-auto">
                        <img class="img-fluid" src="img/doctor-phone.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center my-4">
            <big class="fs-1">
                Facile e veloce!
            </big>
            <div class="row my-5">
                <div class="col-md-4 text-center">
                    <img class="my-img" src="img/consultazione-sito.svg" alt="">
                    <h3 class="mt-3">Scegli il medico</h3>
                    <p>Fai la scelta migliore secondo le tue esigenze: valuta curriculum, prezzo delle prestazioni,
                        patologie trattate e recensioni degli altri pazienti.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img class="my-img" src="img/prenotazione-online.svg" alt="">
                    <h3 class="mt-3">Prenota la visita</h3>
                    <p>Ti bastano pochi secondi: ?? facile e veloce, non serve telefonare e non ?? richiesta la carta di
                        credito: pagherai direttamente al medico.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img class="my-img" src="img/medico-e-paziente.svg" alt="">
                    <h3 class="mt-3">Vai all'appuntamento</h3>
                    <p>Vai dal Medico scelto, nel giorno e nell'ora selezionati. Dopo la visita potrai lasciare una tua
                        recensione che sar?? utile per gli altri pazienti.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CardDoctor from '../components/CardDoctor.vue'
export default {
    name: 'Home',
    data() {
        return {
            search: "",
            mySpecialization: {
                'name': '',
                'id': ''
            },
            doctors: [],
            specializations: [],
            display: false
        }
    },
    components: {
        CardDoctor,
    },
    created() {
        axios.get('/api/doctors')
            .then(res => {
                if (res.data.success) {
                    this.doctors = res.data.result;
                }
            });
    },
    methods: {
        searchInput() {
            if (this.search != '') {
                axios.get('/api/search/specialization?specialization=' + this.search)
                    .then(res => {
                        if (res.data.success) {
                            this.specializations = res.data.result;
                        }
                    });
            } else {
                this.specializations = [];
            }
        },
        selectSpecialization(specialization) {
            this.mySpecialization = {
                'name': specialization.name,
                'id': specialization.id
            };
            this.search = specialization.name;
        },
        displayComponent() {
            this.display = true;
        },
        handleFocusOut() {
            this.display = false;
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/bdoctor-palette.scss";

#bg-searchbar {

    #form {
        height: 60px;
    }
}

.container-jumbo {
    position: relative;

    .cont-jumbo {
        position: absolute;
        top: 43%;
        left: 54%;
        transform: translate(-50%, -50%);
        z-index: 500;

        h1 {
            font-size: 2.7em;
        }

        .form-inputs {
            position: relative;

            img {
                position: absolute;
                top: 9px;
                right: 105px;
                opacity: 50%;
            }
        }
    }
}

.bg-jumbo {
    background-color: rgba($bluelight, $alpha: 0.6);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.wave_container {
    position: relative;

    img {
        width: 100%;
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
    }
}

.wave {
    margin-bottom: -100px;
}

#jumbotron {
    min-width: 100%;
    min-height: 150px;
    height: 40vw;
    object-fit: cover;
    object-position: center;

    @media screen and (max-width: 575px) {
        min-height: 200px;
    }
}



#search-button {
    width: 100px;
}

.search-icon {
    max-width: 20px;
}

li {
    list-style-type: none;
}

.my-collapse {
    z-index: 500;
    width: 60.5%;

    ul {
        padding: 0;
    }

    li {
        list-style-type: none;
        padding-left: 5px;
    }

    li:hover {
        background-color: $bluelight;
    }

    .my-overflow {
        width: 100%;
    }
}

.full-container {
    width: 100%;
    background-color: $bluelight;
}

.row {
    color: $dark;

    .my-img {
        width: 200px;
    }
}

.my-list{
    text-align: start;
    ul{
        li{
            list-style-type: disc;
        }
    }
}
</style>
