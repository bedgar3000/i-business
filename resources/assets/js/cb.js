import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import App from './cb/App';
import Dashboard from './cb/Dashboard';
import Prueba from './cb/Prueba';

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/cb',
            name: 'dashboard',
            component: Dashboard,
        },
        {
            path: '/cb/prueba',
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