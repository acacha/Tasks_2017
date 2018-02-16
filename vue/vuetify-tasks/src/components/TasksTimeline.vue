<template>
    <div>
        <timeline :events="taskEvents"></timeline>
    </div>
</template>

<style>
</style>

<script>
  // import actions from './store/action-types'
  import Timeline from './TimelineComponent'
  export default {
    name: 'TasksTimeline',
    components: { Timeline },
    data () {
      return {
        taskEvents: []
      }
    },
    mounted () {
      // actions.FETCH_TASK_EVENTS.then(() => {
      //
      // }).catch()
      this.taskEvents = [
        {
          'time': '12/01/2018 12:45:00',
          'type': 'created',
          'task_name': 'Compra pa',
          'user_name': 'Sergi Tur'
        },
        {
          'time': '12/01/2018 12:45:00',
          'type': 'created',
          'task_name': 'Compra pa',
          'user_name': 'Sergi Tur'
        },
        {
          'time': '12/01/2018 12:45:00',
          'type': 'created',
          'task_name': 'Compra pa',
          'user_name': 'Sergi Tur'
        }
      ]
    }
  }
</script>
