import Home from './views/Home.vue'
import App from './App.vue'


export default [
  {
    path: '/simple',
    component: App,
    children: [
      {
        path: 'home',
        name: 'simple_home',
        component: Home
      }
    ]
  }
]

