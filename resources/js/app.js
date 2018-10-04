import VueRouter from 'vue-router'
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

import App from './views/App'
import routes from './routes'
import store from './store'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Vue from 'vue';
import datePicker from 'vue-bootstrap-datetimepicker';
import 'bootstrap/dist/css/bootstrap.css';
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css';
import multiselect from 'vue-multiselect';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

axios.defaults.baseURL = API_URL;

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(VueAxios, axios);
Vue.use(datePicker);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('list-films', require('./components/ListFilmComponent.vue').default);
Vue.component('show-film', require('./components/ShowFilmComponent.vue').default);
Vue.component('add-film', require('./components/AddFilmComponent.vue').default);
Vue.component('multiselect', multiselect);

const router = new VueRouter({routes});

Vue.router = router;

Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
    rolesVar: 'type',
    loginData: {url: 'api/login', method: 'POST', redirect: '/', fetchUser: true},
    registerData: {url: 'api/register', method: 'POST', redirect: '/', fetchUser: true},
    logoutData: {url: URL + 'logout', method: 'GET', redirect: '/login', makeRequest: true},
    refreshData: {url: URL + 'refresh', method: 'GET', enabled: true, interval: 1000},
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn) {
            next();
            return
        }
        next('/login')
    } else {
        next()
    }
});

App.router = Vue.router;

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {App}
}).$mount('#app');
