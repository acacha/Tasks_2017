<template>
  <body>
    <nav>
      <ul>
        <li>Home</li>
        <li>Description</li>
        <li>ShowCase</li>
        <li>Contact</li>
      </ul>
    </nav>
  </body>

</template>

<script>
export default {
  name: 'Login',
  data () {
    return {
      msg: 'todo'
    }
  }
}
</script>

<style>

nav {
  background-color: #f2f2f2;
  min-height: 50px;
}

nav ul {
  margin:0;
  display:flex;
  list-style: none;
  justify-content: space-around;
}

</style>
