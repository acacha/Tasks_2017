<template>
  <body>
  <div class="container">
    <main>
      <section class="content-header">CONTENT HEADER</section>
      <section><router-view/></section>
    </main>

    <aside class="left_sidebar" :class="{ isOpen: menuOpen }">Left Sidebar</aside>
    <aside class="rigth_sidebar">Rigth Sidebar</aside>

    <footer>FOOTER</footer>
    <header>
      <svg @click="toogleSideBar" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      HEADER
    </header>
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

  .icon {
    display: inline-block;
    height: 1.25em;
    width: 1.25em;
    fill: currentColor;
  }

  header,
  footer,
  aside,
  main,
  .content-header {
    padding: 1.2rem;
  }

  .container {
    display: grid;
    grid-template-columns: 200px 1fr 200px;
    grid-template-rows: 50px 1fr 50px;
  }

  header {
    color: white;
    background-color: #3c8dbc;
    grid-row: 1;
    grid-column-start: 1;
    grid-column-end: 4;
  }
  footer {
    background-color: white;
    grid-row: 3;
    grid-column-start: 1;
    grid-column-end: 4;
  }
  main {
    background-color: #ecf0f5;
    grid-row: 2;
    grid-column-start: 2;
    grid-column-end: 3;
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
    grid-row: 2;
    grid-column-start: 1;
    grid-column-end: 2;
  }

  .rigth_sidebar {
    grid-row: 2;
    grid-column-start: 3;
    grid-column-end: 4;
  }

  /* Responsive */

  @media (max-width: 400px) {
    .container {
      display: block;
    }
  }

</style>
