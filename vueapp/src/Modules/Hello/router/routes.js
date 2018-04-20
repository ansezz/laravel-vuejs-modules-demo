export default [
  {
    path: '/hello',
    component: () => import('../layouts/default'),
    children: [
      {
        path: '', component: () => import('../pages/index')
      },
      { // Always leave this as last one
        path: '*',
        component: () => import('../pages/404')
      }
    ]
  }
]