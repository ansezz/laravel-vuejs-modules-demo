export default [
  {
    path: 'user',
    component: () => import('../layouts/default'),
    children: [
      {
        path: '', name: 'user.index', component: () => import('../pages/index')
      },
      {
        path: 'create', name: 'user.create', component: () => import('../pages/create')
      },
      { // Always leave this as last one
        path: '*',
        component: () => import('../pages/404')
      }
    ]
  }
]
