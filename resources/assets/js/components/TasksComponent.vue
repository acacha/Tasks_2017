<template>
    <div>
        <widget :loading="loading">
            <p slot="title">Tasques</p>
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
                <div class="form-group">
                    <label for="exampleInputEmail1">User</label>
                    <!--<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">-->
                    <users></users>
                </div>
                <div class="form-group">
                    <label for="newTask">Task name</label>
                    <input class="form-control" type="text" v-model="newTask" id="newTask" @keyup.enter="addTask">
                </div>

                <h2>Filtres</h2>

                <ul>
                    <li @click="show('all')" :class="{ active: this.filter === 'all' }">All</li>
                    <li @click="show('completed')" :class="{ active: this.filter === 'completed' }">Completed</li>
                    <li @click="show('pending')" :class="{ active: this.filter === 'pending' }">Pending</li>
                </ul>
            </div>
            <p slot="footer">
                <button :disabled="creating" id="add" @click="addTask" class="btn btn-primary">
                   <i class="fa fa-refresh fa-spin fa-lg" v-if="creating"></i>
                    Afegir
                </button>
            </p>
        </widget>

        <message title="Message" message="" color="info"></message>
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

  import Users from './Users'

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
      components: { Users },
      data() {
        return {
          loading: false,
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
        let url = '/api/v1/tasks'
        this.loading = true
        axios.get(url).then((response) =>  {
          this.tasks = response.data;
        }).catch((error) => {
          console.log(error.message)
          flash(error.message)
        }).then(() => {
          this.loading = false
        })
      }
    }
</script>
