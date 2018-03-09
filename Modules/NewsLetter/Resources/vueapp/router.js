import Home from './views/Home.vue'
import App from './App.vue'


export default [
  {
    path: '/newsletter',
    component: App,
    children: [
      {
        path: 'home',
        name: 'newsletter_home',
        component: Home
      }
    ]
  }
]

