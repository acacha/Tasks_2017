<template>
    <tasks-crud-list :tasks="tasks" @create="create" @delete="delete"></tasks-crud-list>
</template>

<style>

</style>

<script>

  import axios from 'axios'
  import createApi from './api/tasks';

  const crud = createApi('/ap1/v1/tasks');

  export default {
    name: 'TasksContainer',
    data() {
      return {
        tasks: []
      }
    },
    mounted() {
      crudTasks.getAll().then( response => {
        this.tasks = response.data
      }).catch( error => {
        console.log(error)
      })
//      axios.get('/api/v1/tasks').then( response => {
//        this.tasks = response.data
//      }).catch( error => {
//        console.log(error)
//      })
    },
    methods: {
      delete(task) {
        crud.delete(task)
      }
    }
  }
</script>
