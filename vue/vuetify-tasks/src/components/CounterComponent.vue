<template>
    <div>
        {{prova}}
        <button @click="increment">+</button>
        <button @click="decrement">-</button>
        {{ count }}
    </div>
</template>

<style>

</style>

<script>
  import { mapGetters, mapMutations } from 'vuex'

  export default {
    name: 'Counter',
    data () {
      return {
        prova: 'Hello!'
      }
    },
    computed: {
      ...mapGetters(['count'])
    },
    methods: {
      ...mapMutations(['increment', 'decrement'])
    }
  }
</script>
