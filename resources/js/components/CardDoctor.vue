<template>
    <!-- <div class="my-card">
        <div class="my-image-content">
            <span class="my-overlay"></span>
            <div class="my-card-image">
                <img class="my-card-img" :src="doctor.photo" :alt="doctor.name">
            </div>
        </div>
        <div class="my-card-content">
            <div class="my-card-name fw-bold m-auto my-2">
                <big>Dr.</big>
                <big class="card-title"> {{ doctor.name }} </big>
                <big class="card-title"> {{ doctor.lastname }} </big>
            </div>
            <div>
                <big><strong>Città:</strong></big>
                <big>{{ doctor.city }}</big>
            </div>
            <div>
                <big class="card-title fw-bold">Su di me</big>
                <p class="my-text-cv">{{ doctor.cv }}</p>
            </div>

            <span class="lh-lg">
                <strong>Voto:</strong>
                <font-awesome-icon v-for="(myStar, i) in Math.floor(doctor.vote)" :key="i" icon="fa-solid fa-star" />
                <font-awesome-icon v-for="(myEmptyStar, j) in (5 - Math.floor(doctor.vote))" :key="j + doctor.vote" icon="fa-regular fa-star" />
            </span>

            <div class="card-body d-flex flex-column justify-content-end">
                <router-link :to="{name: 'profile', params: {id: doctor.id.toString()} }" class="btn btn-primary bg-gradient col-12 my-btn">Visualizza
                </router-link>
            </div>
        </div>
    </div> -->
    <div class="card border-0 shadow mb-3" style="max-width: 500px">
        <div class="row g-0">
            <div class="card-header d-flex justify-content-between border-0 rounded-top text-light">
                <div class="my-card-name">
                    <big>Dr.</big>
                    <big class="card-title"> {{ doctor.name }} </big>
                    <big class="card-title"> {{ doctor.lastname }} </big>
                </div>
                <div>
                    <i class="fas fa-map-marker-alt align-text-top me-1"></i>
                    <big>{{ doctor.city }}</big>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4 col-md-4">
                <div class="my-card-image">
                    <img class="my-card-img" :src="doctor.photo" :alt="doctor.name">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="card-text">
                        <div class="mb-2">
                            <font-awesome-icon v-for="(myStar, i) in Math.floor(doctor.vote)" :key="i" icon="fa-solid fa-star" />
                            <font-awesome-icon v-for="(myEmptyStar, j) in (5 - Math.floor(doctor.vote))" :key="j + doctor.vote" icon="fa-regular fa-star" />
                            <small class="fst-italic ms-1">Valutazione del medico</small>
                            <hr>
                        </div>
                        <div>
                            <big class="card-title">Su di me</big>
                            <p class="my-text-cv" style="font-size: .9em">{{ doctor.cv }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center justify-content-lg-start p-3 ms-lg-2">
                <router-link :to="{name: 'profile', params: {id: doctor.id.toString()} }" class="my-btn btn btn-primary bg-gradient rounded-pill border-0 px-4 shadow-sm">Visualizza
                </router-link>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: 'CardDoctors',
    props: {
        doctor: Object,
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/bdoctor-palette.scss";
*::-webkit-scrollbar {
    width: 5px;
}

*::-webkit-scrollbar-track {
    background: white;
}

*::-webkit-scrollbar-thumb {
    background-color: $bluedark;
    border-radius: 20px;
    border: 1px solid $bluedark;
}

.my-card {
    width: 260px;
    border-radius: 25px;
    background-color: #FFF;
    color: $dark;
    margin: 15px;
}

.my-image-content {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.card-header {
    background-color: $blue;
}

.my-image-content {
    position: relative;
    row-gap: 5px;
    padding: 25px 0;
}

.my-overlay {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: $bluedark;
    border-radius: 25px 25px 0 25px;
}

.my-overlay::before,
.my-overlay::after {
    content: '';
    position: absolute;
    right: 0;
    bottom: -40px;
    height: 40px;
    width: 40px;
    background-color: $bluedark;
}

.my-overlay::after {
    border-radius: 0 25px 0 0;
    background-color: #FFF;
}

.my-card-image {
    height: 130px;
    width: 130px;
    border-radius: 50%;
}

.my-card-image .my-card-img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.card-text {

    .fa-star{
        color: rgb(239, 203, 0);
    }

    small {
        color: $ultradark;
    }

    .my-text-cv {
        height: 130px;
        overflow-y: scroll;
        margin: 0;
        padding-top: 3px;
    }
}

.my-btn{
    background-color: $bluedark;
    border: 1px solid $bluedark;

    &:hover{
        background-color: $ultradark;
        border: 1px solid $ultradark;
    }
}
</style>
