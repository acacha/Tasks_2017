import * as types from './mutation-types'
import * as actions from './action-types'
import tasks from '../api/tasks'

export default {
  [ actions.INCREMENT ] (context) {
    context.commit(types.INCREMENT)
  },
  [ actions.FETCH_TASKS ] (context) {
    context.commit(types.SET_TASKS, tasks.fetch())
  }
}
