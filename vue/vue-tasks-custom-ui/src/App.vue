<template>
  <body>
  <div class="container">
    <header>
      <b>Admin</b>LTE
    </header>
    <nav class="header-nav">
      <a href="">
        <svg @click="toogleSideBar" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      </a>
      <ul>
        <li>
          <a href="#Emails">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 8a6 6 0 0 1 4.03-5.67 2 2 0 1 1 3.95 0A6 6 0 0 1 16 8v6l3 2v1H1v-1l3-2V8zm8 10a2 2 0 1 1-4 0h4z"/></svg>
          </a>
        </li>
        <li>
          <a href="#Notification">Notifications</a>
        </li>
        <li>
          <a href="#Tasks">Tasks</a>
        </li>
        <li>
          <a href="#Profile"><img class="avatar" src="http://www.gravatar.com/avatar/046889f49471fd40d105eb76b9d83bf6.jpg" alt="Sergi Tur"> Sergi Tur Badenas</a>
        </li>
        <li>
          <a href="#Preferences">Preferences</a>
        </li>
      </ul>
    </nav>
    <main>
      <section class="content-header">CONTENT HEADER</section>
      <section><router-view/></section>
    </main>

    <aside class="left_sidebar" :class="{ isOpen: menuOpen }">
      <div class="user-panel">
        <div>
          <img class="avatar" src="http://www.gravatar.com/avatar/046889f49471fd40d105eb76b9d83bf6.jpg" alt="Sergi Tur">
        </div>
        <div>
          <p>Sergi Tur Badenas</p>
          <svg height="14" width="14">
            <circle cx="7" cy="7" r="5" stroke="#3d763e" stroke-width="1" fill="#3d763e" />
          </svg>
          Online
        </div>
      </div>
      <form action="">
        <input type="text" placeholder="Search">
        <button type="submit">
          <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
        </button>
      </form>
      <nav>
        <ul>
          <li class="header">Main menu</li>
          <li><a href="#dashboard">Dashboard</a></li>
          <li><a href="#tasques">Tasques</a></li>
          <li><a href="#other">Other</a></li>
          <!--<li>-->
            <!--<a href="#options">Options</a>-->
            <!--<ul><li><a href="#suboption1">subOption 1</a></li></ul>-->
            <!--<ul><li><a href="#suboption2">subOption 2</a></li></ul>-->
            <!--<ul><li><a href="#suboption3">subOption 3</a></li></ul>-->
          <!--</li>-->
          <li class="header">Secondary menu</li>
          <li><a href="#menu1">Menu 1</a></li>
          <li><a href="#menu2">Menu 2</a></li>
          <li><a href="#menu3">Menu 3</a></li>
        </ul>
      </nav>
    </aside>
    <aside class="rigth_sidebar">Rigth Sidebar</aside>

    <footer>FOOTER</footer>
  </div>
  </body>
  <!--https://codepen.io/oknoblich/pen/klnjw-->
</template>

<script>
  export default {
    name: 'app',
    data () {
      return {
        menuOpen: false
      }
    },
    methods: {
      toogleSideBar () {
        this.menuOpen = !this.menuOpen
      }
    }
  }
</script>

<style>

  html, body, .container {
    margin: 0;
    height: 100%;
  }

  body {
    font-family: 'Source Sans Pro','Helvetica Neue','Helvetica','Arial','sans-serif';
    font-weight: 400;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
  }

  a {
    text-decoration: none;
    color: inherit;
  }

  .avatar {
    border-radius: 50%;
    height: 40px;
    margin-right: 0.5em;
  }

  .icon {
    display: inline-block;
    height: 1.25em;
    width: 1.25em;
    fill: currentColor;
  }

  .container {
    display: grid;
    grid-template-columns: 200px 1fr 200px;
    grid-template-rows: 50px 1fr 50px;
  }

  header {
    color: white;
    background-color: #367fa9;
    grid-row: 1;
    grid-column: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    /*ALTERNATIVE TO CENTER:*/
    /*margin: auto;*/
    /*height: 100%;*/
    /*width: 100%;*/
    font-size: 20px;
  }

  header:hover {
    cursor:pointer;
    background-color: #357ca5;
  }

  footer {
    background-color: white;
    grid-row: 3;
    grid-column:2/4;
  }
  main {
    background-color: #ecf0f5;
    grid-row: 2;
    grid-column: 2;
  }
  aside {
    color: white;
    background-color: #222d32;
  }
  .content-header { background-color: #d2d6de; }

  /*OFF CANVAS*/
  /*.left_sidebar {*/
  /*position: fixed; !* or choose `absolute` depending on desired behavior*!*/
  /*top: 0;*/
  /*bottom: 0;*/
  /*width: 200px;*/
  /*left: -200px;*/
  /*transition: left .3s ease-in-out;*/
  /*grid-row: 2;*/
  /*grid-column-start: 1;*/
  /*grid-column-end: 1;*/
  /*}*/

  /*.left_sidebar.isOpen {*/
  /*transform: translate3d(200px,0,0);*/
  /*}*/

  .left_sidebar {
    grid-row: 2/4;
    grid-column: 1;
  }

  .user-panel {
    padding: 10px;
    /*border: 1px solid black;*/
    /*background-color: white;*/
    /*color: #111;*/
    display:flex;
    font-size: 10px;
  }

  .user-panel p {
    margin: 0;
    font-size: 14px;
    font-weight: 600;
  }

  .left_sidebar form {
    padding: 10px;
  }

  .left_sidebar ul {
    margin: 0;
    background-color: #2d3c42;
    display: flex;
    flex-direction: column;
    /*border: 1px solid black;*/
  }

  .left_sidebar ul li a {
    /*border: 1px solid black;*/
    background-color: #2d3c42;
    display: block;
    padding: 12px 15px;
  }

  .left_sidebar ul li.header {
    /*border: 1px solid black;*/
    color: #4b646f;
    background: #1a2226;
    text-transform: uppercase;
    font-size: 12px;
    padding: 12px 15px;
    cursor: auto;
  }

  .left_sidebar ul li a:hover {
    background-color: #222d32;
  }

  .rigth_sidebar {
    grid-row: 2;
    grid-column: 3;
  }

  ul, li {
    list-style: none;
  }

  ul {
    margin: 0;
    padding: 0;
  }

  .header-nav {
    grid-row: 1;
    grid-column: 2/4;
    background-color: #3c8dbc;
    color: #fff;
    display: flex;
  }

  .header-nav>a {
    padding: 0.5rem;
    /*margin-right: auto; !** PULL-LEFT **!*/
    height: 100%;
    display: flex;
    align-self: center;
    align-items: center;
  }

  .header-nav ul {
    display: flex;
    margin: 0px 0px 0px auto;
  }

  .header-nav ul li {
    height: 100%;
    display: flex;
    align-items: center;
  }

  .header-nav ul li a {
    padding: 12px 15px 12px 15px;
    display:flex;
    align-items: center;
  }

  .header-nav ul li:hover, .header-nav>a:hover {
    background-color: #367fa9;
  }

  /* Responsive */

  @media (max-width: 400px) {
    .container {
      display: block;
    }
  }

</style>
