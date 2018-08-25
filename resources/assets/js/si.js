window.Vue = require('vue');

window.VueRouter = require('vue-router').default;

window.VueAxios = require('vue-axios').default;

window.Axios = require('axios').default;
Axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Datatable = require('vue2-datatable-component').default;

let AppLayout = require('./si/App.vue');

const Dashboard = require('./si/Dashboard.vue');
const Usuarios = require('./si/usuarios/Lista.vue');
const UsuariosForm = require('./si/usuarios/Form.vue');

Vue.use(VueRouter, VueAxios, Axios, Datatable);
Vue.use(require('vue-moment'));

const routes = [{
        name: 'dashboard',
        path: '/si',
        component: Dashboard
    },
    {
        name: 'usuarios',
        path: '/si/usuarios',
        component: Usuarios
    },
    {
        name: 'usuarios-create',
        path: '/si/usuarios/:form',
        component: UsuariosForm,
        props: true
    }
];

const router = new VueRouter({ mode: 'history', routes: routes });

new Vue(
    Vue.util.extend({ router },
        AppLayout
    )
).$mount('#app');

/*
require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import Axios from 'axios';

Vue.use(VueRouter, VueAxios, Axios);

import App from './si/App';
import Dashboard from './si/Dashboard';
import Usuarios from './si/usuarios/Lista';

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/si',
            name: 'dashboard',
            component: Dashboard,
        },
        {
            path: '/si/usuarios',
            name: 'usuarios',
            component: Usuarios
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
*/