
window._ = require('lodash');


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Vue = require('vue');

import vSelect from 'vue-select';

import VeeValidate from 'vee-validate';

import VueNumericInput from 'vue-numeric-input';

// import Vuesax from 'vuesax';

Vue.use(VeeValidate);
Vue.use(VueNumericInput);
// Vue.use(Vuesax);

Vue.component('v-select', vSelect);

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('j-input-basic', require('./components/input/basic'));
Vue.component('j-input-icon', require('./components/input/withicon'));
Vue.component('j-input-group', require('./components/input/group'));
Vue.component('j-radio-group', require('./components/radio/multi'));
Vue.component('j-switch-group', require('./components/switch/switch_main'));

window.eventBus = new Vue();
const app = new Vue({
    data:{

    }
});
