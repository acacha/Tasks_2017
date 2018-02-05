<template>
    <ul>
        <li v-for="task in tasks">{{ task.name}} </li>
    </ul>
</template>

<style>

</style>

<script>
  import { mapGetters } from 'vuex'
  import * as actions from '../store/action-types'

  export default {
    name: 'Tasks',
    computed: {
      ...mapGetters(['tasks'])
    },
    mounted () {
      this.$store.dispatch(actions.FETCH_TASKS)
    }
  }
</script>
