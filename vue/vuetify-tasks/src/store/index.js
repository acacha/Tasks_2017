import Vuex from 'vuex'

import * as actions from './actions'
import * as mutations from './mutations'
import * as getters from './getters'

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
