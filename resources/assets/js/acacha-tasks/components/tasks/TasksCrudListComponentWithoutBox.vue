<template>
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
