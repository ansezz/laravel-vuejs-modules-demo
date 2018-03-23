import {routesModules} from './../modules.js'
import _ from 'lodash'

let routes = [
  {
    path: '/',
    name: 'blog',
    component: () => import('layouts/blog'),
    children: [
      {path: '', component: () => import('pages/index')}
    ]
  },
  {
    path: '/admin',
    name: 'admin',
    component: () => import('layouts/admin'),
    children: [
      {path: '', component: () => import('pages/index')}
    ]
  },
  {
    path: '/auth',
    name: 'auth',
    component: () => import('layouts/auth'),
    children: [
      {path: '', component: () => import('pages/index')}
    ]
  },
  { // Always leave this as last one
    path: '*',
    component: () => import('pages/404')
  }
]

_.forEach(routes, function (route) {
  if (routesModules[route.name]) {
    _.forEach(routesModules[route.name], function (mroutes) {
      route.children = _.concat(route.children, mroutes)
    })
  }
})

export default routes
