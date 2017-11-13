<template>
    <div>
        example
        {{prova}}
    </div>
</template>

<style>

</style>

<script>

  import axios from 'axios'

  export default {
    name: 'users',
    data() {
      return {
        users: []
      }
    },
    mounted() {
      console.log('Mounted ok')
      axios.get('/api/v1/users').then( response => {
        this.users = response.data
      }).catch( error => {
        console.log(error)
      })
    }
  }
</script>
