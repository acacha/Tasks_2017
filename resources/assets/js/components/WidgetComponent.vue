<template>
    <div class="box box-primary" v-cloak>
        <div class="box-header with-border">
            <h3 class="box-title"><slot name="title">Tasks:</slot></h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>

        </div>

        <div class="box-body" style="">
            <slot></slot>
        </div>
        <div class="box-footer"><slot name="footer">@Copyright Sergi Tur</slot></div>
    </div>
</template>

<style>

</style>

<script>

  export default {
      data() {
        return {
        }
      },
      mounted() {
        console.log('Component widget montat')
      }
    }
</script>
