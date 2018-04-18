import * as TYPES from './mutation-types'

export default {
  [TYPES.SET_LOGGED] (state, value) {
    console.log('setLogged mutation')
    state.isLogged = value
  },
  [TYPES.SET_USER] (state, value) {
    state.user = value
  }
}
