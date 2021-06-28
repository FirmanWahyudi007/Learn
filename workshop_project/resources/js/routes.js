import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
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
        path: '/users/artikel',
        component: ArtikelIndex
    },
  ];
   
  let router = new VueRouter({ mode: 'history', routes: routes});
  export default router