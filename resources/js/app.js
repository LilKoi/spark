

require('./bootstrap');
import store from './store.js'
window.Vue = require('vue').default;
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import router from "./router"
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VueRouter from "vue-router"
console.log(router)
const routers = new VueRouter
({
    mode: 'history',
    routes:router
})
let infiniteScroll =  require('vue-infinite-scroll');
Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(infiniteScroll)
Vue.component('app', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
    store:store,
    router: routers,
    directives: {infiniteScroll}
});
