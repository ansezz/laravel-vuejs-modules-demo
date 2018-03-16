export default [
  {
    path: '/newsletter',
    component: () => import('../layouts/default'),
    children: [
      {
        path: '', component: () => import('../pages/index')
      },
      {
        path: 'contact', component: () => import('../pages/contact')
      },
      { // Always leave this as last one
        path: '*',
        component: () => import('../pages/404')
      }
    ]
  }
]
