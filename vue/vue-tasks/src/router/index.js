import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Example from '@/components/Example'
import Login from '@/components/Login'
import Tasks from '@/components/Tasks'
import MainLayout from '@/components/layouts/MainLayout'

Vue.use(Router)

let router = new Router({
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
            description: 'Vue hello World',
            requiresAuth: true
          }
        },
        {
          path: 'example',
          name: 'Example',
          component: Example,
          meta: {
            description: 'Peazo de exemple',
            requiresAuth: false
          }
        },
        {
          path: 'tasks',
          name: 'Tasks',
          component: Tasks,
          meta: {
            description: 'Tasques',
            requiresAuth: true
          }
        }
      ]
    }
  ],
  linkExactActiveClass: 'active',
  scrollBehavior: function (to, from, savedPosition) {
    return savedPosition || { x: 0, y: 0 }
  }
})

// Navigation Guards: Similar to Middleware in Laravel
// https://router.vuejs.org/en/advanced/navigation-guards.html

// Route meta fields:
// https://router.vuejs.org/en/advanced/meta.html
// Utilitzem per indicar quines rutes han de ser "guarded" és a dir cal·len de login previ per entrar

// ESTAT
// ESTAT LOGAT: tenim token
// ESTAT NO LOGAT: no tenim token

// On guardem el token? On guardem l'estat? Com gestionem l'estat?:

// https://vuejs.org/v2/guide/state-management.html

// Com compartim dades entre components? I encara més important com ens assegurem que les dades estan sincronitzades

// "Single Source Of Truth"
// Amb el sistema bàsic de Vue per compartir dades entre components (props i esdeveniments) pot ser molt farregos
// compartir este tipos de dades i complica la cosa

// Concepte nou: un store com a objecte compartit entre tots els components Vue per compartir informació

// Podem utilitzar eines més currades com Vuex: https://github.com/vuejs/vuex

// Now whenever sourceOfTruth is mutated, both vmA and vmB will update their views automatically. Subcomponents within each of these instances would also have access via this.$root.$data. We have a single source of truth now, but debugging would be a nightmare. Any piece of data could be changed by any part of our app at any time, without leaving a trace.

// router.app = objecte Vue : https://router.vuejs.org/en/api/router-instance.html

// Global Event Bus: https://alligator.io/vuejs/global-event-bus/

// STORE: estat compartit --> VUEX (FLUX)

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth) && (!router.app.$store.state.token || router.app.$store.state.token === 'null')) {
    window.console.log('Not authenticated')
    next({
      path: '/login',
      query: { redirect: to.fullPath }
    })
  } else {
    next()
  }
})

export default router
