import Vue from 'vue'
import Vuex from 'vuex'
import {storeModules} from './../modules.js'
import {Platform} from 'quasar'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {leftDrawerOpen: Platform.is.desktop},
  mutations: {
    toggleLeftDrawer (state) {
      // mutate state
      state.leftDrawerOpen = !state.leftDrawerOpen
    }
  },
  actions: {
    toggleLeftDrawer (context) {
      context.commit('toggleLeftDrawer')
    }
  },
  getters: {},
  modules: storeModules
})

export default store
