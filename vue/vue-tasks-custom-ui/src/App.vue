<template>
  <body>
  <div class="container">
    <header>
      <b>AdminL</b>TE
    </header>
    <nav>
      <a href="">
        <svg @click="toogleSideBar" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      </a>
      <ul>
        <li>
          <a href="">Emails</a>
        </li>
        <li>
          <a href="">Notifications</a>
        </li>
        <li>
          <a href="">Tasks</a>
        </li>
        <li>
          <a href="">Logged use</a>
        </li>
        <li>
          <a href="">Preferences</a>
        </li>
      </ul>
    </nav>
    <main>
      <section class="content-header">CONTENT HEADER</section>
      <section><router-view/></section>
    </main>

    <aside class="left_sidebar" :class="{ isOpen: menuOpen }">Left Sidebar</aside>
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

  nav {
    border: 1px solid black;
    grid-row: 1;
    grid-column: 2/4;
    background-color: #3c8dbc;
    color: #fff;
    display: flex;
  }

  nav ul {
    display: flex;
    margin: 0px 0px 0px auto;
  }

  nav>a {
    padding: 0.5rem;
    margin-right: auto;
    align-self: center;
    border: 1px solid black;
    height: 100%;
    display: flex;
    align-items: center;
  }

  nav ul li {
    border: 1px solid black;
    height: 100%;
    display: flex;
    align-items: center;
  }

  nav ul li:hover, nav>a:hover {
    background-color: #367fa9;
  }

  /* Responsive */

  @media (max-width: 400px) {
    .container {
      display: block;
    }
  }

</style>
