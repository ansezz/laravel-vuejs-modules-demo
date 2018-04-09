import {routesModules} from './../modules.js'
import _ from 'lodash'

let routes = [
  {
    path: '/admin',
    meta: {layout: 'admin', requiresAuth: true},
    component: () => import('layouts/admin'),
    children: [
      {path: '', name: 'admin.index', component: () => import('pages/index')}
    ]
  },
  { // Always leave this as last one
    path: '*',
    component: () => import('pages/404'),
    meta: {}
  }
]

_.forEach(routes, function (route) {
  if (routesModules[route.meta.layout]) {
    _.forEach(routesModules[route.meta.layout], function (mroutes) {
      route.children = _.concat(route.children, mroutes)
    })
  }
})

export default routes
