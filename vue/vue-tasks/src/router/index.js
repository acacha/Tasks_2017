import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Example from '@/components/Example'
import Login from '@/components/Login'
import MainLayout from '@/components/layouts/MainLayout'

Vue.use(Router)

export default new Router({
  routes: [
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
            description: 'Vue hello World'
          }
        },
        {
          path: 'example',
          name: 'Example',
          component: Example,
          meta: {
            description: 'Peazo de exemple'
          }
        }
      ]
    }
  ]
})
