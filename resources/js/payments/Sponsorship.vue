<template>
    <div>
        <h2 v-if="sponsorship == 1">Stai acquistando la sponsorizzazione base</h2>
        <h2 v-if="sponsorship == 2">Stai acquistando la sponsorizzazione avanzata</h2>
        <h2 v-if="sponsorship == 3">Stai acquistando la sponsorizzazione pro</h2>
        <div v-if="loading">
            <Payment
            ref="paymentRef"
            :authorization="tokenApi"
            @onSuccess="paymentOnSuccess"
            />
        </div>
        <div v-else>
            <h3>{{message}}</h3>
        </div>
    </div>
</template>

<script>
import Payment from './Payment.vue'
export default {
    name: "Sponsorships",
    components: {
        Payment,
      },
    data() {
        return {
            sponsorship: "",
            user: "",
            tokenApi: "",
            loading: false,
            message: 'Loading...'
        };
    },
    created() {
        axios.get("/api/orders/generate")
            .then(res => {
            if (res.data.success) {
                this.tokenApi = res.data.token;
                this.loading = true;
            }
        });
    },
    mounted() {
        this.user = window.user;
        this.sponsorship = window.sponsorship;
    },
    methods: {
        paymentOnSuccess(token){
            axios.post("/api/orders/make/payment",{
                token: token,
                sponsorship: this.sponsorship,
                user: this.user
            })
            .then(res => {
            if (res.data.success) {
                this.message = res.data.message;
                this.loading = false;
            }
        });
        }
    }
}
</script>

<style>

</style>
