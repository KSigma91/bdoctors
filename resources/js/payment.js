require('./bootstrap');

window.Vue = require('vue');
import vueBraintree from 'vue-braintree';

Vue.use(vueBraintree)
import Sponsorship from './payments/Sponsorship.vue';

const app = new Vue({
    el: '#sponsorship',
    render: h => h(Sponsorship),
});