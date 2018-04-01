export default [
  {
    path: 'users',
    component: () => import('../layouts/default'),
    children: [
      {
        path: '', name: 'users.index', component: () => import('../pages/index')
      },
      {
        path: 'create', name: 'users.create', component: () => import('../pages/create')
      },
      { // Always leave this as last one
        path: '*',
        component: () => import('../pages/404')
      }
    ]
  }
]
