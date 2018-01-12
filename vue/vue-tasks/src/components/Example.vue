<template>
    <div class="prova">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                {{data}}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
    </div>
</template>

<style>
    .prova {
        width: 100%;
        min-height: 100%;
        height: auto !important;
        position: absolute;
    }
</style>

<script>
  export default {
    name: 'Example',
    data () {
      return {
        data: 'Start creating your amazing application!'
      }
    }
  }
</script>
