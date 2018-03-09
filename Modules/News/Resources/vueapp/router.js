import Home from './views/Home.vue'
import App from './App.vue'


export default [
  {
    path: '/news',
    component: App,
    children: [
      {
        path: 'home',
        name: 'news_home',
        component: Home
      }
    ]
  }
]

