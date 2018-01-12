<template>
    <div>
        <ul>
            <li v-for="(task, index) in tasks">
                {{ index }} - {{ task.name }}
            </li>
        </ul>
    </div>
</template>

<style>

</style>

<script>
  import axios from 'axios'
  export default {
    name: 'Tasks',
    data () {
      return {
        tasks: []
      }
    },
    mounted () {
      axios.get('http://localhost:8081/api/v1/tasks').then(response => {
        console.log(response.data)
        this.tasks = response.data
      }).catch(error => {
        console.log('ERROR:' + error)
        console.log(error)
      })
    }
  }
</script>
