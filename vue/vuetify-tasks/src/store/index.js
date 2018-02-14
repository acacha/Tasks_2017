import Vue from 'vue'
import Vuex from 'vuex'

import actions from './actions'
import mutations from './mutations'
import getters from './getters'

Vue.use(Vuex)

const store = new Vuex.Store({
  strict: true,
  state: {
    count: 0,
    tasks: []
  },
  getters,
  mutations,
  actions
})

export default store
