export default {
  fetch () {
    // axios.get('api/v1/tasks').then(response => {
    //   let tasks = response.data
    //   context.commit('tasks', tasks)
    //   // state.tasks = tasks
    // })
    // .catch(error => {
    //   console.log(error)
    // })
    console.log('PROVANDO!!!!!!!!!!!!')
    return [
      {'name': 'Comprar pa'},
      {'name': 'Estudiar més'},
      {'name': 'bla bla bla'}
    ]
  }
}
