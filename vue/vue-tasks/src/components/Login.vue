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
                      <input type="email" class="form-control" placeholder="Email" v-model="email" name="email">
                  </div>
                  <div class="form-group has-feedback">
                      <input type="password" class="form-control" placeholder="Password" v-model="password" name="password">

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
    .login-page {
        width: 100%;
        min-height: 100%;
        height: auto !important;
        position: absolute;
    }
</style>

<script>
  import axios from 'axios'
  import store from '../store/store'

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
        axios.post('http://localhost:8060/api/v1/proxy/oauth/token', {
          'username': this.email,
          'password': this.password
        }).then(response => {
          const token = response.data.access_token
          if (token) {
            if (window.localStorage) {
              window.localStorage.setItem('token', token)
            }
            store.setTokenAction(token)
            axios.defaults.headers.common['authorization'] = `Bearer ${token}`
          }
          this.$router.push(response.data.redirect ? response.data.redirect : '/')
        }).catch(error => {
          console.log('ERROR:' + error)
          console.log(error)
        })
      }
    }
  }
</script>
