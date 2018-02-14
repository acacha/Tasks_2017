<template>
    <div>
        <v-card v-for="task in tasks" :key="task.id"  class="mb-1">
            <v-card-media :src="task.image" height="200px">
            </v-card-media>
            <v-card-title primary-title>
                <div>
                    <h3 class="headline mb-0">{{ task.name}}</h3>
                    <div>{{ task.description}}</div>
                </div>
            </v-card-title>
            <v-card-actions>
                <v-btn flat color="orange">Edite</v-btn>
                <v-btn flat color="orange">Delete</v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<style>

</style>

<script>
  import { mapGetters } from 'vuex'
  import * as actions from '../store/action-types'

  export default {
    name: 'Tasks',
    computed: {
      ...mapGetters(['tasks'])
    },
    mounted () {
      this.$store.dispatch(actions.FETCH_TASKS)
    }
  }
</script>
