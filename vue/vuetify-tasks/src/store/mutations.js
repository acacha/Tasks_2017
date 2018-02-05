import * as types from './mutation-types'

export default {
  [ types.INCREMENT ] (state) {
    state.count++
  },
  [ types.DECREMENT ] (state) {
    state.count--
  },
  [ types.COUNT ] (state, count) {
    state.count = count
  },
  [ types.SET_TASKS ] (state, tasks) {
    state.tasks = tasks
  }
}
