<template>
    <div>
        <h2>Hoverable Dropdown</h2>
        <p>Move the mouse over the button to open the dropdown menu.
        <div class="dropdown">
            <button class="dropbtn">Dropdown</button>
            <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolor ipsum similique. Autem consequuntur cum cupiditate dignissimos eveniet harum in non obcaecati officia officiis, placeat quae quis quos rem rerum.
    </div>
    </div>
</template>

<style>
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    }
</style>

<script>
  export default {
    name: 'name',
    data () {
      return {
        data: 'example'
      }
    },
    mounted () {
      console.log('Mounted ok')
    }
  }
</script>
