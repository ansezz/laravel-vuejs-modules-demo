export default [
  {
    path: 'auth',
    component: () => import('../layouts/auth'),
    children: [
      {
        path: 'login',
        name: 'auth.login',
        component: () => import('../pages/auth/Login'),
        meta: {requiresAuth: false}
      }
    ]
  }, {
    path: 'users',
    component: () => import('../layouts/default'),
    children: [
      {
        path: '',
        name: 'users.index',
        component: () => import('../pages/index'),
        meta: {requiresAuth: true}
      },
      {
        path: 'create',
        name: 'users.create',
        component: () => import('../pages/create'),
        meta: {requiresAuth: true}
      },
      { // Always leave this as last one
        path: '*',
        component: () => import('../pages/404')
      }
    ]
  }
]
