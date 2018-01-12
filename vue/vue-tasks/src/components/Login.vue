<template>
  <body class="hold-transition login-page">
  <div class="login-box">
      <div class="login-logo">
          <a href="#"><b>Admin</b>LTE</a>
      </div>
      <div class="login-box-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form @submit.prevent="submit" method="post">
              <div class="form-group has-feedback">
                  <input type="email" class="form-control" placeholder="Email" v-model="email">
              </div>
              <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Password" v-model="password">

              </div>
              <div class="row">
                  <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  </body>
</template>

<style>
    html {
        height: 100%;
    }
    body {
        min-height: 100%;
    }
</style>

<script>
  import axios from 'axios'
  export default {
    name: 'Login',
    data () {
      return {
        email: '',
        password: ''
      }
    },
    methods: {
      submit () {
        this.$http.post('http://localhost:8081/oauth/token', {
          'grant_type': 'password',
          'client_id': 2,
          'client_secret': 'uo1smtRcl6xLAmBNBLi6MeALEOb0dozwG3MsbDJp',
          'username': this.email,
          'password': this.password
        }).then(response => {
          console.log(response.body)
        }, error => {
          console.log('ERROR!!!!!!!!!!')
          console.log(error)
        })
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
        axios.post('http://localhost:8081/oauth/token', {
          'grant_type': 'password',
          'client_id': 2,
          'client_secret': 'uo1smtRcl6xLAmBNBLi6MeALEOb0dozwG3MsbDJp',
          'username': this.email,
          'password': this.password
        }, { withCredentials: true }).then(response => {
          console.log('HEY!!!!!!!')
          console.log(response)
          console.log(response.data)
        }).catch(error => {
          console.log('ERROR:' + error)
          console.log('SHIT!!!!!!!!!!!!!')
        })

//        axios.get('http://localhost:8081/api/v1/tasks').then(response => { console.log(response) }).catch(error => { console.log(error) })
//        $response = $http->post('http://your-app.com/oauth/token', [
//          'form_params' => [
//          'grant_type' => 'password',
//          'client_id' => 'client-id',
//          'client_secret' => 'client-secret',
//          'username' => 'taylor@laravel.com',
//          'password' => 'my-password',
//          'scope' => '',
//      ],
//      ]);
      }
    }
  }
</script>
