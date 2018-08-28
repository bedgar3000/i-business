import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import App from './rh/App';
import Dashboard from './rh/Dashboard';
import Prueba from './rh/Prueba';

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/rh',
            name: 'dashboard',
            component: Dashboard,
        },
        {
            path: '/rh/prueba',
            name: 'prueba',
            component: Prueba
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});