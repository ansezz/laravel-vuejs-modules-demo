import {routesModules} from './../modules.js'
import _ from 'lodash'

let routes = [
  {
    path: '/',
    name: 'default',
    component: () => import('layouts/default'),
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
