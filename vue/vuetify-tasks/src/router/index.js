import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Prova from '@/components/Prova'
import Counter from '@/components/CounterComponent'
import Tasks from '@/components/TasksComponent'
import TasksTimeline from '@/components/TasksTimeline'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/prova',
      name: 'Prova',
      component: Prova
    },
    {
      path: '/counter',
      name: 'Counter',
      component: Counter
    },
    {
      path: '/tasks',
      name: 'Tasks',
      component: Tasks  // Page Components o Container
    },
    {
      path: '/tasks/timeline',
      name: 'TasksTimeline',
      component: TasksTimeline  // Page Components o Container
    }
  ]
})
