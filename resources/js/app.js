require('./bootstrap');
import Vue from "vue";
import router from "./router/router";
import store from './store/index';

import App from './/App.vue';

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App),
});
