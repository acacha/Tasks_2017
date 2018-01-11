// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
// import {$, jQuery} from 'admin-lte/bower_components/jquery/dist/jquery.min.js'
// window.$ = $
// window.jQuery = jQuery
// import 'admin-lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'
// import 'admin-lte/bower_components/fastclick/lib/fastclick.js'
// import 'admin-lte/dist/js/adminlte.min.js'
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store/store'

Vue.config.productionTip = false

if (window.localStorage) {
  let token = window.localStorage.getItem('token') || 'null'

  if (token) {
    store.setTokenAction(token)
  }
}

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store: store,
  template: '<App/>',
  components: { App }
})
