import Vue from 'vue'
import Vuex from 'vuex'
import {storeModules} from './../modules.js'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: storeModules
})

export default store
