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
                <div class="btn-group">
                    <button @click="show('all')" type="button" class="btn btn-default" :class="{ 'btn-primary': this.filter === 'all' }">All</button>
                    <button @click="show('completed')" type="button" class="btn btn-default" :class="{ 'btn-primary': this.filter === 'completed' }">Completed</button>
                    <button @click="show('pending')" type="button" class="btn btn-default" :class="{ 'btn-primary': this.filter === 'pending' }">Pending</button>
                </div>
                <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('user_id') }">
                    <label for="user_id">User</label>
                    <transition name="fade">
                        <span v-text="form.errors.get('user_id')" v-if="form.errors.has('user_id')" class="help-block"></span>
                    </transition>
                    <!--<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">-->
                    <users @select="userSelected" id="user_id" name="user_id" v-model="form.user_id" :value="form.user_id"></users>
                </div>
                <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('name') }">
                    <label for="name">Task name</label>
                    <transition name="fade">
                        <span v-text="form.errors.get('name')" v-if="form.errors.has('name')" class="help-block"></span>
                    </transition>
                    <input @input="form.errors.clear('name')" class="form-control" type="text" v-model="form.name" id="name" name="name" @keyup.enter="addTask">
                </div>
            </div>
            <p slot="footer">
                <button :disabled="form.submitting || form.errors.any()" id="add" @click="addTask" class="btn btn-primary">
                   <i class="fa fa-refresh fa-spin fa-lg" v-if="form.submitting"></i>
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
    .fade-enter-active, .fade-leave-active {
        transition: opacity 3s ease;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>



<script>

  import Users from './Users'
  import Form from 'acacha-forms'

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

  const API_URL = '/api/v1/tasks'

  import { wait } from './utils.js'

  export default {
      components: { Users },
      data() {
        return {
          loading: false,
          editedTask: null,
          filter: 'all',
          tasks: [],
          taskBeingDeleted: null,
          form: new Form({ user_id : 1, name: 'canvia nom tasca siusplau'})
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
        userSelected(user) {
          this.form.user_id = user.id
        },
        show(filter) {
          this.filter = filter
        },
        addTask() {
          let url = API_URL
          this.form.post(url).then( (response) =>  {
            this.tasks.push({ name : this.form.name , user_id: this.form.user_id , completed : false})
            this.form.name=''
          }).catch((error) => {
            flash(error.message)
          })
        },
        isCompleted(task) {
          return task.completed
        },
        deleteTask(task) {

          let url = '/api/v1/tasks/' + task.id
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
        let url = API_URL
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
