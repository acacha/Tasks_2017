<template>
    <div :class="'alert alert-' + dataColor + ' alert-dismissible flash-message'" v-if="visible && dataMessage !=''">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> {{ dataTitle }}</h4>
        {{ dataMessage }}
    </div>
</template>

<style>
    .flash-message {
        position: fixed;
        right: 25px;
        bottom: 25px;
    }
</style>

<script>
    export default {
      data() {
        return {
          visible: true,
          dataMessage: this.message,
          dataTitle: this.title,
          dataColor: this.color
        }
      },
      methods: {
        show() {
          this.visible = true
          var component = this
          setTimeout( () => {
            component.hide()
          },3000)

        },
        hide(){
          this.visible = false
        }
      },
      props: {
        'title': {
          required: false
        },
        'message': {
          required: true
        },
        'color' : {
          required: false,
          default: 'danger'
        }
      },
      mounted() {
        var component = this
        window.flash = function (message) {
          component.dataMessage = message
          component.show()
        }

        this.show()
      }
    }
</script>
