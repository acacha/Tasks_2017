
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('tasks-container', require('./components/tasks/TasksContainerComponent.vue'));
Vue.component('tasks-crud-list', require('./components/tasks/TasksCrudListComponent.vue'));

Vue.component('tasks', require('./components/TasksComponent.vue'));
Vue.component('tasks1', require('./components/Tasks1Component.vue'));
Vue.component('tasks-old', require('./components/TasksOldComponent.vue'));
Vue.component('message', require('./components/MessageComponent.vue'));
Vue.component('widget', require('./components/WidgetComponent.vue'));
Vue.component('users', require('./components/Users.vue'));

Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue')
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue')
);


import Vuetable from 'vuetable-2/src/components/Vuetable'
Vue.use(Vuetable)

// Vue Single file component

const app = new Vue({
    el: '#app'
});

$(function () {
  $('.textarea').wysihtml5();
});
