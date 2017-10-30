<template>
    <div>
        <widget :loading="loading">
            <p slot="title">Tasques</p>
            <tasks @loading="load"></tasks>
            <p slot="Footer">Footer</p>
        </widget>

        <message title="Message" message="" color="info"></message>
    </div>
</template>

<style>

</style>

<script>
  export default {
    data() {
      return {
        loading : false
      }
    },
    methods: {
      load(load) {
        console.log(load)
        this.loading = load
      }
    },
    mounted() {
      console.log('Mounted tasks view')
    }
  }
</script>