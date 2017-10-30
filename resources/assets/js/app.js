
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

Vue.component('tasks', require('./components/TasksComponent.vue'));
Vue.component('message', require('./components/MessageComponent.vue'));

import Vuetable from 'vuetable-2/src/components/Vuetable'
Vue.use(Vuetable)

Vue.component("vuetable", Vuetable);
// Vue.component("vuetable-pagination", VueTablePaginationInfo);
// Vue.component("vuetable-pagination-dropdown", VueTablePaginationDropDown);
// Vue.component("vuetable-pagination-info", VueTablePaginationInfo);

// import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
// import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'

// Vue Single file component

const app = new Vue({
    el: '#app'
});
