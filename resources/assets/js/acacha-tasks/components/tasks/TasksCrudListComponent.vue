<template>
    <div class="box box-primary">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">To Do List</h3>

            <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>
        <div class="box-body">
            <ul class="todo-list ui-sortable">
                <li v-for="(task, index) in tasks">
                    <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                    <input @click="" type="checkbox" value="">
                    <span class="text">{{ task.name }}</span>
                    <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                    <div class="tools">
                        <i class="fa fa-edit"></i>
                        <i class="fa fa-trash-o"></i>
                    </div>
                </li>

            </ul>
        </div>
        <div class="box-footer clearfix no-border">
            <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
        </div>
    </div>
</template>

<style>

</style>

<script>
  export default {
    name: 'TasksCrudList',
    props: {
      tasks: {
        type: Array,
        required: true
      }
    }
  }
</script>
