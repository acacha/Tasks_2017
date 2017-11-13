<template>
    <div>
        Users ({{count}}):
        <!--<ul>-->
            <!--<li v-for="user in users"> {{ user.name }}</li>-->
        <!--</ul>-->

        <select>
            <option v-for="user in users" :value="user.id"> {{ user.name }} - {{ user.email }}</option>
        </select>
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
    computed: {
      count() {
        return this.users.length
      }
    },
    mounted() {
      axios.get('/api/v1/users').then( response => {
        this.users = response.data
      }).catch( error => {
        console.log(error)
      })
    }
  }
</script>
