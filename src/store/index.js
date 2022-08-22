import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    token: null
  },
  getters: {
  },
  mutations: {
    setToken(state, payload){
      state.token = payload;
    }
  },
  actions: {
    readToken({commit}){
      if(localStorage.getItem('token')){
        commit('setToken', localStorage.getItem('token'));
      } else {
        commit('setToken', null);
      }
    }
  },
  modules: {
  }
})
