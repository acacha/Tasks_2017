export const increment = (state) => {
  state.count++
}

export const decrement = (state) => {
  state.count--
}

export const count = (state, count) => {
  state.count = count
}

export const tasks = (state, tasks) => {
  state.tasks = tasks
}
