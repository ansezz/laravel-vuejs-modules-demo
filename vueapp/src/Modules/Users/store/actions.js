import * as TYPES from './mutation-types'

export default {
  setUser ({commit}, user) {
    commit(TYPES.SET_USER, user)
  },
  setLogged ({commit}, value) {
    console.log('setLogged action')
    commit(TYPES.SET_LOGGED, value)
  }
}
