import Vue from 'vue'
import Router from 'vue-router'
import MainLayout from '@/components/layouts/MainLayout'
import HelloWorld from '@/components/HelloWorld'
import Landing from '@/components/Landing'
import Login from '@/components/Login'
import Tasks from '@/components/Tasks'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Landing',
      component: Landing
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/',
      name: 'MainLayout',
      component: MainLayout,
      children: [
        {
          path: 'hello',
          alias: '',
          component: HelloWorld,
          name: 'Hello',
          meta: {
            description: 'Vue hello World',
            requiresAuth: true
          }
        },
        {
          path: 'tasks',
          name: 'Tasks',
          component: Tasks,
          meta: {
            description: 'Tasks',
            requiresAuth: true
          }
        }
      ]
    }
  ]
})
