import Vue from 'vue';
import Vuex from 'vuex';
import User from './store/User.js'
Vue.use(Vuex);
const store = new Vuex.Store({
  modules: {
    User,
  }
})

export default store