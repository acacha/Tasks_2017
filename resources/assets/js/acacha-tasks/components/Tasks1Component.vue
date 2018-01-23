<template>
    <div id="root" v-cloak>
        <ul>
            <li v-for="task in filteredTasks" :class="{ completed: isCompleted(task) }" @dblclick="updateTask(task)">


                <input type="text" v-if="task == editedTask">
                <div v-else>
                    @{{task.name}}
                    <i class="fa fa-pencil" aria-hidden="true" @click="updateTask(task)"></i>
                    <i class="fa fa-times" aria-hidden="true" @click="deleteTask(task)"></i>
                </div>

            </li>
        </ul>
        Nova Tasca a afegir: <input type="text" v-model="newTask" id="newTask" @keyup.enter="addTask">
        <button id="add" @click="addTask">Afegir</button>

        <h2>Filtres</h2>

        <ul>
            <li @click="show('all')" :class="{ active: this.filter === 'all' }">All</li>
            <li @click="show('completed')" :class="{ active: this.filter === 'completed' }">Completed</li>
            <li @click="show('pending')" :class="{ active: this.filter === 'pending' }">Pending</li>
        </ul>
    </div>
</template>

<style>

</style>

<script>

  // visibility filters
  var filters = {
    all: function (tasks) {
      return tasks
    },
    pending: function (tasks) {
      return tasks.filter(function (task) {
        return !task.completed
      })
    },
    completed: function (tasks) {
      return tasks.filter(function (task) {
        return task.completed
      })
    }
  }

  const LOCAL_STORAGE_KEY = 'TASKS'

  export default {
    name: 'Tasks1',
    data () {
      return {
        editedTask: null,
        filter: 'all',
        newTask: '',
        tasks: []
      }
    },
    watch: {
      // whenever question changes, this function will run
      tasks: function () {
        console.log('Ha canviat watchers')
        // TODO Save to LocalStorage
        localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(this.tasks))
        console.log('asdasdasd')
      }
    },
    computed: {
      // a computed getter
      filteredTasks () {
        return filters[this.filter](this.tasks)
      },
      pendingTasks () {
//        filters['all'].length
//        filters.all(this.tasks).length
      }
    },
    methods: {
      show(filter) {
        this.filter = filter
      },
      addTask() {
        console.log('addTask')
        this.tasks.push({ name : this.newTask, completed : false})
        console.log('3')
        this.newTask=''
      },
      isCompleted(task) {
        return task.completed
      },
      deleteTask(task) {
        this.tasks.splice( this.tasks.indexOf(task) , 1 )
      },
      updateTask(task){
        console.log('Ok ja editare');
        this.editedTask = task
      }
    },
    mounted () {
      console.log('Mounted ok')
      // TODO Obtenir les tasques de la LocalStorage
      //
//      this.tasks = localStorage.getItem()
//      this.newTask = localStorage.setItem('NEW_TASK','Nova tasca')

      this.tasks = JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY) || '[]')
      console.log(this.tasks)
      console.log('Inici 2!')

//      JSON.parse          Json -> Objecte -> Quan llegim de Local Storage
//      JSON.stringify()->  Objecte a Json -> Guardar a la base de dades

      // json_encode() | json_decode() PHP!!!!
    }
  }
</script>
