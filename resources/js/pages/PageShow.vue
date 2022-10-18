<template>
    <div class="bg-show min-vh-100 position-relative">
        <div class="container position-absolute top-50 start-50 translate-middle mt-5">
            <div class="d-flex justify-content-start flex-wrap mb-5">
                <div class="card col-12 col-sm-12 col-md-12 col-lg-10 d-flex flex-column justify-content-center m-auto border-0 shadow" style="border-radius: 15px">
                    <!-- foto profilo -->
                    <div class="mb-0 mt-2 mb-md-0 mb-lg-4">
                        <ul class="card-header d-flex flex-wrap justify-content-between bg-white border-0 py-4 px-3">
                            <li class="d-flex flex-wrap justify-content-center justify-content-md-center order-1 order-md-1 order-lg-0 gap-3 gap-md-3 gap-lg-1 mt-5 mt-lg-0 col-12 col-md-5 col-lg-5">
                                <span class="me-lg-3 text-secondary"><i class="fa-regular fa-envelope" style="color: #00334e"></i> {{ showProfile.email }}</span>
                                <span class="me-lg-2 text-secondary"><i class="fa-solid fa-phone" style="color: #00334e"></i> {{ showProfile.phone }}</span>
                            </li>
                            <li>
                                <img id="user-img" class="img-fluid rounded-circle shadow-sm" :src="showProfile.photo" :alt="showProfile.name">
                            </li>
                            <li class="d-flex justify-content-between justify-content-md-between justify-content-lg-end mt-5 mt-sm-5 mb-md-4 mt-md-0 mt-lg-0 col-12 col-md-12 col-lg-7">
                                <button class="btn btn-sm rounded-pill border-0 me-4 p-2 px-3 text-light" style="background: #23A3B3" id="contatta" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom" @click="displayMessage">Contatta</button>
                                <button class="btn btn-sm btn-bg-blu-chiaro p-2 px-3 rounded-pill border-0 text-light" id="feedback" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas" @click="displayReview">Recensisci</button>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-sm-0 mt-md-5">
                        <ul class="card-body flex-column align-items-center gap-2 col-12 col-sm-12 col-md-12 col-lg-12">
                            <li class="col-12 text-center">
                                <big class="display-4 fs-2" style="font-weight: 300">
                                    Dr. {{ showProfile.name }} {{ showProfile.lastname }}
                                </big>
                            </li>
                            <li>
                                <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-center gap-1 mt-2 display-4 fs-6">
                                    <span class="me-2"><i class="fa-regular fa-building me-1"></i> {{ showProfile.city }}, {{ showProfile.postal_code }}</span>
                                    <span><i class="fa-solid fa-location-dot me-1"></i>Via {{ showProfile.address }}</span>
                                </div>
                            </li>
                            <li class="my-4 text-center">
                                <h5 class="blu-scuro">Servizi</h5> {{ showProfile.service }}
                            </li>
                            <li class="col-12 text-center">
                                <h5 class="blu-scuro text-center">Specializzazione</h5>
                                <span v-for="specialization in showProfile.specializations" :key="specialization.id"
                                class="bg-label badge mx-1 text-dark display-4" style="font-weight: 500">
                                    {{ specialization.name }}
                                </span>
                                <hr class="border-secondary">
                            </li>
                            <li class="col-12 flex-center">
                                <button class="btn btn-sm p-2 px-3 rounded-pill border-0 text-light" id="curriculum" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="background: #007fbd">
                                    Leggi curriculum
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- campo contatta  -->
        <div class="card offcanvas offcanvas-bottom position-absolute top-50 start-50 translate-middle border-0 col-10 col-lg-6" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" style="height: 350px">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title display-4 fs-5" id="offcanvasBottomLabel">Prenota per un appuntamento</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="color:#007fbd">
                <div class="form-floating m-auto" v-show="displayM">
                    <!-- email -->
                    <div class="d-flex justify-content-start">
                        <div>
                            <label for="floatingTextarea2"><small class="fst-italic">Email*</small></label>
                            <input required id="message-email" class="form-control" type="email" v-model="email" placeholder="La tua email...">
                        </div>
                    </div>
                    <!-- messaggio  -->
                    <div class="mt-4">
                        <label for="floatingTextarea2"><small class="fst-italic">Messaggio*</small></label>
                        <textarea required class="form-control position-relative" placeholder="Lascia un messaggio..." id="floatingTextarea2" v-model="text" style="height: 100px"></textarea>
                        <div class="text-end">
                            <button class="btn position-absolute top-100 end-0 translate-middle rounded-pill py-0 px-2 text-light" id="liveToastBtn" style="background: #23A3B3" @click="newMessage(showProfile.id)">Invia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- campo feedback -->
        <div class="card offcanvas position-absolute top-50 start-50 translate-middle border-0 col-10 col-lg-6" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel"  style="height: 350px">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title display-4 fs-5" id="offcanvasBottomLabel">Scrivi una recensione</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="color:#007fbd">
                <div class="form-floating m-auto" v-show="displayR">
                    <!-- voto -->
                    <div class="d-flex flex-wrap justify-content-start gap-3">
                        <div>
                            <label for="floatingTextarea2"><small class="fst-italic">Nome*</small></label>
                            <input required id="review-nome" class="form-control" type="text" v-model="name" placeholder="Il tuo nome...">
                        </div>
                        <div id="voto">
                            <label for="floatingTextarea2"><small class="fst-italic">Voto*</small></label>
                            <input required class="form-control" type="number" v-model="vote" placeholder="voto...">
                        </div>
                    </div>
                    <!-- recensione  -->
                    <div class="mt-4">
                        <label for="floatingTextarea2"><small class="fst-italic">Recensione*</small></label>
                        <textarea class="form-control position-relative" placeholder="Lascia una recensione..." id="floatingTextarea2" v-model="text" style="height: 100px"></textarea>
                        <div class="text-end">
                            <button class="btn position-absolute top-100 end-0 translate-middle rounded-pill py-0 px-2 text-light" id="liveToastBtn" style="background: #23A3B3" @click="newReview(showProfile.id)">Invia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- curriculum a comparsa -->
        <div class="card offcanvas offcanvas-bottom position-absolute top-50 start-50 translate-middle border-0 col-10 col-lg-5" id="offcanvasExample" style="height: 81vh">
            <div class="offcanvas-header">
                <h5 class="mt-2 display-4 fs-5">Dr. {{ showProfile.name }} {{ showProfile.lastname }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body mt-1 lh-lg">
                <p>{{ showProfile.cv }}</p>
                <div class="position-relative mt-5">
                    <hr class="m-auto text-secondary w-75">
                    <img class="position-absolute top-50 start-50 translate-middle bg-white" src="../../../public/img/BDoctors_icon_1.svg" alt="BD_icon" style="width: 40px">
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
    name: 'PageShow',
    props: {
        id: String,
    },
    data() {
        return {
            showProfile: [],
            name: '',
            vote: '',
            text: '',
            email: '',
            displayR: false,
            displayM: false,
            displayC: false,
            prova: false
        }
    },
    created() {
        axios.get('/api/doctors/' + this.id)
            .then(res =>{
                if (res.data.success) {
                    this.showProfile = res.data.result
                }
            })
    },
    methods: {
        newReview($id){
            if(this.name != '' && this.vote != '' &&  this.text != ''){
                if(this.vote >= 1 && this.vote <= 5){
                    axios.post('/api/review', {
                        id: $id,
                        name: this.name ,
                        vote: this.vote,
                        text: this.text
                    })
                    .then(res => {
                        if (res.data.success) {
                            this.name = '';
                            this.vote = '';
                            this.text = '';
                            this.displayR = false;
                        }
                        Swal.fire('Recensione inviata');
                    }).catch(function (error) {
                        console.log(error);
                    });
                } else {
                    Swal.fire('il voto deve essere compreso tra 1 e 5');
                }
            } else {
                Swal.fire('compila tutti i campi obbligatori');
            }
        },
        newMessage($id){
            if(this.email != '' && this.text != ''){
                if (!this.email.includes('@') || !this.email.includes('.')) {
                    Swal.fire('email non corretta');
                    return false;
                } else {
                    axios.post('/api/message', {
                    id: $id,
                    email: this.email ,
                    text: this.text
                })
                .then(res => {
                    if (res.data.success) {
                        this.email = '';
                        this.text = '';
                        this.displayM = false;
                    }
                    Swal.fire('Messaggio inviato');
                }).catch(function (error) {
                    console.log(error);
                })
                }
            } else {
                Swal.fire('compila tutti i campi obbligatori');
            }
        },
        displayReview() {
            if (this.displayM = this.displayM) {
                this.displayM = !this.displayM
            }
            this.displayR = !this.displayR
        },
        displayMessage() {
            if (this.displayR = this.displayR) {
                this.displayR = !this.displayR
            }
            this.displayM = !this.displayM
        }
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/bdoctor-palette.scss";
.bg-show {
    background: url('../../../public/img/BDoctors_bg_2.svg');
    background-size: cover;
    background-position: top;
    background-repeat: no-repeat;
}
.card {
    position: relative;

    img {
        position: absolute;
        top: 8%;
        left: 50%;
        transform: translate(-50%, -50%);

        @media screen and (max-width: 468px) {
            top: 4%;
            left: 50%;
        }
    }

    #contatta {
        font-weight: 500;
        box-shadow: 0 0 0px #23A3B3 inset, 0 4px 8px rgba($color: #23A3B3, $alpha: .4);
    }

    #feedback {
        font-weight: 500;
        box-shadow: 0 0 0px #004d73 inset, 0 4px 8px rgba($color: #004d73, $alpha: .4);
    }

    #curriculum {
        font-weight: 500;
        box-shadow: 0 0 0px #007fbd inset, 0 4px 8px rgba($color: #007fbd, $alpha: .4);
    }
}

li {
    list-style-type: none;
}

#user-img {
    width: 200px;
    height: 200px;
    object-fit: cover;
    object-position: center;

    @media screen and (max-width: 468px) {
        width: 160px;
        height: 160px;
    }
}

#review-nome {
    width: 200px;
}

#message-email {
    width: 300px;
}

#voto {
    width: 80px;
}
// colors
.bg-label {
    background: $bluelight;
}

.blu-scuro {
    color: $bluedark;
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
.btn-bg-blu-chiaro {
    background-color: $bluedark;

    &:hover {
        background: $ultradark
    }
}
.bg-blu-chiaro {
    background-color: $bluedark;
}
.bg-blu-chiaro2 {
    background-color: #8ce6ff;
}
.bg-nero {
    background-color: #2a2d45;
}
</style>
