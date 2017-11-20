<template>
    <div>
      <multiselect :id="id" :name="name" v-model="user" :options="users" :custom-label="customLabel"></multiselect>
    </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>


<script>

  import axios from 'axios'
  import Multiselect from 'vue-multiselect'

  export default {
    components: {Multiselect},
    name: 'users',
    data() {
      return {
        user: null,
        users: []
      }
    },
    props: ['id','name'],
    computed: {
      count() {
        return this.users.length
      }
    },
    methods: {
      customLabel( { name, email } ) {
        return `${name} — ${email}`
      },
      customLabel1( user ) {
        return `${user.name} — ${user.email}`
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
