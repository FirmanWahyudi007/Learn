require('./bootstrap');

window.Vue = require('vue');


import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

 

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

import App from './components/App.vue';
import Home from './components/Home.vue';
import ArtikelIndex from './components/ArtikelIndex.vue'

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'artikel',
        path: '/artikel/page/:id',
        component: ArtikelIndex
    },
  ];
   
  const router = new VueRouter({ mode: 'history', routes: routes});
  const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app-vue');