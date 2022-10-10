<template>
    <div class="min-vh-100">
        <div class="container my-5">
            <div class="d-flex flex-column justify-content-center">
                <div class="col-12 mb-4">
                    <div class="card w-100 m-auto" style="border-color: #007fbd">
                        <div class="card-header bg-gradient text-light" style="background: #007fbd; border-color: #007fbd">
                            <h5 class="m-auto">Filtra per:</h5>
                        </div>
                        <!-- searchbar -->
                        <ul class="list-group list-group-flush">
                            <!-- Specialization -->
                            <li class="list-group-item" style="border-color: #007fbd"><strong>Specializzazioni:</strong><br>
                                <form class="d-flex form-inline py-2 my-lg-0">
                                    <input v-model="specializationSelect.name" class="form-control mr-sm-2 w-50 me-2" type="search_spec"
                                        placeholder="Scrivi qui.." aria-label="Search_spec" @input="searchInput"
                                        @click="displayComponent" @keyup="displayComponent">
                                    <button class="filter-btn btn btn-outline-primary my-2 m my-sm-0 rounded-3" type="button" @click="searchDoctor(1)">Filtra</button>
                                </form>

                                <div class="collapse position-absolute d-flex my-collapse" v-if="display"
                                    @mouseleave="handleFocusOut">
                                    <ul class="card overflow-auto my-overflow">
                                        <li v-for="specializationLi in specializations" :key="specializationLi.id"
                                            @click="selectSpecialization(specializationLi)">
                                            {{ specializationLi.name }}
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- City -->
                            <li class="list-group-item" style="border-color: #007fbd"><strong>Città:</strong><br>
                                <form class="d-flex form-inline py-2 my-lg-0">
                                    <input v-model="city" @keyup.enter="searchDoctor" @input="searchInputCity"
                                        class="form-control mr-sm-2 rounded-3 w-50 me-2" type="search_city"
                                        placeholder="Scrivi qui.." aria-label="Search_city" @click="displayComponentCity" @keyup="displayComponentCity">
                                    <button class="filter-btn btn btn-outline-primary my-2 m my-sm-0 rounded-3"
                                        type="button" @click="searchDoctor(1)">Filtra</button>
                                </form>

                                <div class="collapse position-absolute d-flex my-collapse" v-if="displayCity"
                                @mouseleave="handleFocusOutCity">
                                <ul class="card overflow-auto my-overflow">
                                    <li v-for="cityLi, index in citys" :key="index"
                                        @click="selectCity(cityLi.city)">
                                        {{ cityLi.city }}
                                    </li>
                                </ul>
                            </div>
                            </li>
                            <!-- Vote -->
                            <li class="list-group-item" style="border-color: #007fbd">
                                <strong>Media Voto:</strong>
                                <span v-for="item in 5" :key="item" class="mx-1">
                                    <input class="form-check-input" type="radio" name="vote" id="flexRadioDefault1"
                                        :checked="vote === item" @click="changeVote(item)">
                                    <label class="form-check-label" for="vote">
                                        {{item}}
                                    </label>
                                </span>
                            </li>
                            <!-- Review -->
                            <li class="list-group-item" style="border-color: #007fbd">
                                <strong>Numero Recensioni:</strong>
                                <span v-for="item in 4" :key="item" class="mx-1">
                                    <input class="form-check-input" type="radio" name="review" id="flexRadioDefault1"
                                        :checked="review === item" @click="changeReview(item)">
                                    <label class="form-check-label" for="review">
                                        {{item}}
                                    </label>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div v-if="doctors_sponsorship !== ''">
                    <h2>Scelti da noi:</h2>
                    <div class="d-flex flex-wrap my-4">
                        <CardDoctor v-for="(doctor, index) in doctors_sponsorship" :key="index" :doctor="doctor" class="m-2"/>
                    </div>
                </div>
                <div v-if="doctors !== ''">
                    <h2>Tutti i medici:</h2>
                    <div class="d-flex flex-wrap my-4">
                        <CardDoctor v-for="(doctor, index) in doctors" :key="index" :doctor="doctor" class="m-2"/>
                    </div>
                </div>
                <nav aria-label="Page navigation" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link input-nav" href="#" aria-label="Previous" @click="searchDoctor(--currentPage)">
                                <span aria-hidden=" true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link input-nav" href="#" @click="searchDoctor(currentPage)">{{
                                currentPage
                        }}</a>
                        </li>
                        <li class=" page-item">
                            <a class="page-link input-nav" href="#" aria-label="Next" @click="searchDoctor(++currentPage)">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import CardDoctor from '../components/CardDoctor.vue'
export default {
    name: 'PageAdvanceSearch',
    props: {
        specialization: String
    },
    components: {
        CardDoctor,
    },
    data() {
        return {
            doctors: '',
            doctors_sponsorship: '',
            specializations: [],
            specializationSelect: {
                'name' : '',
                'id' : null
            },
            city: '',
            citys: [],
            vote: 0,
            review: 0,
            display: false,
            displayCity: false,
            currentPage: 1
        }
    },
    created() {
        this.specializationSelect.id = this.specialization;
        axios.get('/api/search/specialization/id?id=' + this.specialization)
                .then(res => {
                    if (res.data.success) {
                        this.specializationSelect.name = res.data.result.name;
                    }
                });
        this.searchDoctor(1);
    },
    methods: {
        searchDoctor(page) {
            if(this.specializationSelect.id != ''){
                if(this.city == ''){
                    axios.post('/api/search',{
                            specialization: this.specializationSelect.id,
                            city: 'all',
                            reviews: this.review,
                            vote: this.vote,
                            page: page
                        })
                        .then(res => {
                        if (res.data.success) {
                            this.doctors = res.data.result[0].data;
                            this.doctors_sponsorship = res.data.result[1];
                            this.currentPage = res.data.result[0].current_page;
                            let path = '/search/' + this.specializationSelect.id;
                            if (this.$route.path !== path) {
                                this.$router.push({name: 'AdvanceSearch', params: {specialization: this.specializationSelect.id.toString()}});
                            }
                        }
                    })
                } else {
                    axios.post('/api/search',{
                            specialization: this.specializationSelect.id,
                            city: this.city,
                            reviews: this.review,
                            vote: this.vote,
                            page: page
                        })
                        .then(res => {
                        if (res.data.success) {
                            this.doctors = res.data.result[0].data;
                            this.doctors_sponsorship = res.data.result[1];
                            this.currentPage = res.data.result[0].current_page;
                            let path = '/search/' + this.specializationSelect.id;
                            if (this.$route.path !== path) {
                                this.$router.push({name: 'AdvanceSearch', params: {specialization: this.specializationSelect.id.toString()}});
                            }
                        }
                    })
                }

            }
        },
        changeVote(id) {
            this.vote = id;
            this.searchDoctor(1);
        },
        changeReview(id) {
            this.review = id;
            this.searchDoctor(1);
        },

        searchInput() {
            if (this.specializationSelect.name != '') {
                axios.get('/api/search/specialization?specialization=' + this.specializationSelect.name)
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
          this.specializationSelect.name = specialization.name;
          this.specializationSelect.id = specialization.id;
        },
        displayComponent() {
            this.display = true;
        },
        handleFocusOut() {
            this.display = false;
        },
        searchInputCity() {
            if (this.city != '') {
                axios.get('/api/search/city?city=' + this.city)
                    .then(res => {
                        if (res.data.success) {
                            this.citys = res.data.result;
                        }
                    });
            } else {
                this.citys = [];
            }
        },
        selectCity(city) {
          this.city = city;
        },
        displayComponentCity() {
            this.displayCity = true;
        },
        handleFocusOutCity() {
            this.displayCity = false;
        },
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/bdoctor-palette.scss";

.filter-btn {
    border-color: #007fbd;
    color: #007fbd;

    &:hover {
        background: #007fbd;
    }
}

.form-check {
        display: inline-block;
    }

    #search-button {
        width: 100px;
    }

    #search-icon {
        max-width: 20px;
    }

    .my-collapse{
        z-index: 500;
        width: 47%;

        ul{
            padding: 0;
        }

        li{
            list-style-type:none;
            padding-left: 5px;
        }

        li:hover{
            background-color: $bluelight;
        }

        .my-overflow{
            width: 100%;
        }
    }

.input-nav {
    color: #007fbd;
}
</style>
