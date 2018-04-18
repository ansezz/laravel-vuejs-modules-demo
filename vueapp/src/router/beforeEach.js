import store from '../store'

const needAuth = auth => auth === true

const beforeEach = (to, from, next) => {
  const auth = to.meta.requiresAuth
  /**
   * If route doesn't require authentication be normally accessed.
   */
  if (!needAuth(auth)) {
    if (to.name === 'auth.login' && store.state.users.isLogged) {
      next({name: 'admin.index'})
    } else {
      next()
    }
    return // return to prevent the code from continuing in its flow
    // With this flow `else` or `else if` is not necessary
  }
  if (store.state.users.isLogged) {
    next()
  } else {
    next({name: 'auth.login'})
  }
}

export default beforeEach
