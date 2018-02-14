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
    return [
      {
        'id': 1,
        'image': 'http://lorempixel.com/400/200',
        'name': 'Comprar pa',
        'description': 'lorem asdasdas dasd asd asd asd asd asd asd '
      },
      {
        'id': 2,
        'image': 'http://lorempixel.com/400/200',
        'name': 'Estudiar més',
        'description': 'lorem asdasdas dasd asd asd asd asd asd asd '
      },
      {
        'id': 3,
        'image': 'http://lorempixel.com/400/200',
        'name': 'bla bla bla',
        'description': 'lorem asdasdas dasd asd asd asd asd asd asd '
      }
    ]
  }
}
