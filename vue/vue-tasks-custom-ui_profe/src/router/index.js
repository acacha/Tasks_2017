import Vue from 'vue'
import Router from 'vue-router'
import MainLayout from '@/components/MainLayout'
import HelloWorld from '@/components/HelloWorld'
import Login from '@/components/Login'
import Landing from '@/components/Landing'

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
        }
      ]
    }
  ]
})

export default router
