export const increment = (context) => {
  context.commit('increment')
}

export const fetchTasks = function (context) {
  // axios.get('api/v1/tasks').then(response => {
  //   let tasks = response.data
  //   context.commit('tasks', tasks)
  //   // state.tasks = tasks
  // })
  // .catch(error => {
  //   console.log(error)
  // })
  let tasks = [
    {'name': 'Comprar pa'},
    {'name': 'Estudiar més'},
    {'name': 'bla bla bla'}
  ]
  context.commit('tasks', tasks)
}
