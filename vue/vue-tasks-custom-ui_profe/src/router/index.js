import Vue from 'vue'
import Router from 'vue-router'
import MainLayout from '@/components/MainLayout'
import HelloWorld from '@/components/HelloWorld'
import Login from '@/components/Login'
import Landing from '@/components/Landing'
import Cards from '@/components/Cards'
import Dropdown from '@/components/Dropdown'

Vue.use(Router)

const router = new Router({
  routes: [
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/landing',
      name: 'Landing',
      component: Landing
    },
    {
      path: '/',
      component: MainLayout,
      children: [
        {
          path: '/',
          name: 'HelloWorld',
          component: HelloWorld
        },
        {
          path: '/cards',
          name: 'Cards',
          component: Cards
        },
        {
          path: '/dropdown',
          name: 'Dropdown',
          component: Dropdown
        }
      ]
    }
  ]
})

export default router
