import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store/store'
import axios from 'axios'

Vue.config.productionTip = false

if (window.localStorage) {
  let token = window.localStorage.getItem('token') || 'null'

  if (token) {
    store.setTokenAction(token)
    axios.defaults.headers.common['authorization'] = `Bearer ${token}`
  }
}

// Global: instance properties. https://vuejs.org/v2/cookbook/adding-instance-properties.html
Vue.prototype.$store = store

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  // store -> Not working see prototype below
  template: '<App/>',
  components: { App }
})
