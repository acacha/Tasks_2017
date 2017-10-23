<template>
    <div class="alert alert-danger alert-dismissible" v-if="visible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> {{ dataTitle }}</h4>
        {{ dataMessage }}
    </div>
</template>

<style>

</style>

<script>

    export default {
      data() {
        return {
          visible: true,
          dataMessage: this.message,
          dataTitle: this.title,
        }
      },
      props: {
        'title': {
          required: false
        },
        'message': {
          required: true
        }
      },
      mounted() {
        console.log('Mounted!')
        console.log(this.message)
      }
    }
</script>
