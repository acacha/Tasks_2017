<template>
    <div v-cloak>
        <ul>
            <li v-for="task in filteredTasks" :class="{ completed: isCompleted(task) }"
                @dblclick="updateTask(task)">


                <input type="text" v-if="task == editedTask">
                <div v-else>
                    {{task.name}}
                    <i class="fa fa-pencil" aria-hidden="true" @click="updateTask(task)"></i>
                    <i class="fa fa-refresh fa-spin fa-lg" v-if=" task.id === taskBeingDeleted"></i>
                    <i class="fa fa-times" aria-hidden="true" @click="deleteTask(task)"></i>
                </div>

            </li>
        </ul>
        Nova Tasca a afegir: <input type="text" v-model="newTask" id="newTask" @keyup.enter="addTask">
        <button :disabled="creating" id="add" @click="addTask">
            <i class="fa fa-refresh fa-spin fa-lg" v-if="creating"></i>
            Afegir
        </button>

        <h2>Filtres</h2>

        <ul>
            <li @click="show('all')" :class="{ active: this.filter === 'all' }">All</li>
            <li @click="show('completed')" :class="{ active: this.filter === 'completed' }">Completed</li>
            <li @click="show('pending')" :class="{ active: this.filter === 'pending' }">Pending</li>
        </ul>
    </div>
</template>

<style>
    li.completed {
        text-decoration : line-through;
    }

    [v-cloak] { display: none; }

    li.active {
        background-color: blue;
    }
</style>

<script>

  // visibility filters
  var filters = {
    all: function (tasks) {
      return tasks
    },
    pending : function (tasks) {
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

  import { wait } from './utils.js'

  export default {
      data() {
        return {
          editedTask: null,
          filter: 'all',
          newTask: '',
          tasks: [],
          creating: false,
          taskBeingDeleted: null
        }
      },
      computed: {
        filteredTasks() {
          return filters[this.filter](this.tasks)
        }
      },
      watch: {
        tasks: function() {
//          localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(this.tasks))
        }
      },
      methods: {
        show(filter) {
          this.filter = filter
        },
        addTask() {
          this.creating = true;
          let url = '/api/tasks'
          axios.post(url, { name: this.newTask } ).then( (response) =>  {
            this.tasks.push({ name : this.newTask, completed : false})
            this.newTask=''
          }).catch((error) => {
            flash(error.message)
          }).then(() => {
            this.creating = false;
          })
        },
        isCompleted(task) {
          return task.completed
        },
        deleteTask(task) {

          let url = '/api/tasks/' + task.id
          this.taskBeingDeleted = task.id
          axios.delete(url).then( (response) => {
            this.tasks.splice( this.tasks.indexOf(task) , 1 )
          }).catch( (error) => {
            flash(error.message)
          }).then(
            this.taskBeingDeleted = null
          )
        },
        updateTask(task){
          this.editedTask = task
        }
      },
      mounted() {
        let url = '/api/tasks'
        this.$emit('loading',true)
        axios.get(url).then((response) =>  {
          this.tasks = response.data;
        }).catch((error) => {
          console.log(error.message)
          flash(error.message)
        }).then(() => {
          this.$emit('loading',false)
        })


        // API HTTP amb JSON <- Web service
        // URL GET http://NOM_SERVIDOR/api/task
        // URL POST http://NOM_SERVIDOR/api/task
        // URL DELETE http://NOM_SERVIDOR/api/task/{task}
        // URL PUT/PATCH http://NOM_SERVIDOR/api/task/{task}
      }
    }
</script>
