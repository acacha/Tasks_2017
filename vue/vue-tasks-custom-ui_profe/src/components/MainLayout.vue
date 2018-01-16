<template>
  <body>
  <div class="container">
    <header>
      <strong>Admin</strong>LTE
    </header>
    <nav>
      <a href="#">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      </a>
      <ul>
        <li>
          <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h16zm-4.37 9.1L20 16v-2l-5.12-3.9L20 6V4l-10 8L0 4v2l5.12 4.1L0 14v2l6.37-4.9L10 14l3.63-2.9z"/>
            </svg>
            <span class="label label-success">4</span>
          </a>
        </li>
        <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 8a6 6 0 0 1 4.03-5.67 2 2 0 1 1 3.95 0A6 6 0 0 1 16 8v6l3 2v1H1v-1l3-2V8zm8 10a2 2 0 1 1-4 0h4z"/></svg></a></li>
        <li><a href="#"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.03 2.6a3 3 0 0 1 5.94 0L15 3v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h1V3l2.03-.4zM5 6H4v12h12V6h-1v1H5V6zm5-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg></a></li>
        <li><img class="avatar" src="http://www.gravatar.com/avatar/046889f49471fd40d105eb76b9d83bf6.jpg" alt="sergiturbadenas@gmail.com">Sergi Tur Badenas</li>
        <li><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M3.94 6.5L2.22 3.64l1.42-1.42L6.5 3.94c.52-.3 1.1-.54 1.7-.7L9 0h2l.8 3.24c.6.16 1.18.4 1.7.7l2.86-1.72 1.42 1.42-1.72 2.86c.3.52.54 1.1.7 1.7L20 9v2l-3.24.8c-.16.6-.4 1.18-.7 1.7l1.72 2.86-1.42 1.42-2.86-1.72c-.52.3-1.1.54-1.7.7L11 20H9l-.8-3.24c-.6-.16-1.18-.4-1.7-.7l-2.86 1.72-1.42-1.42 1.72-2.86c-.3-.52-.54-1.1-.7-1.7L0 11V9l3.24-.8c.16-.6.4-1.18.7-1.7zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></li>
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
</template>

<script>
  export default {
    name: 'MainLayout',
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
    height: 1.25rem;
    width: 1.25rem;
    fill: currentColor;
  }

  .container {
    display: grid;
    grid-template-columns: 200px 1fr 200px;
    grid-template-rows: 50px 1fr 50px;
  }

  header {
    grid-row: 1;
    grid-column: 1;
    display: flex;
    align-items: center;     /* VERTICAL CENTER */
    justify-content: center; /* HORIZONTAL CENTER */
    /*ALTERNATIVE TO CENTER:*/
    /*margin: auto;*/
    /*height: 100%;*/
    /*width: 100%;*/
    font-size: 20px;
    background-color: #367fa9;
    color:white;
  }

  ul,li{
    list-style: none;
  }

  nav {
    color: white;
    background-color: #3c8dbc;
    grid-row: 1;
    /*grid-column-start: 1;*/
    /*grid-column-end: 4;  NEXT LINES ARE THE SAME BUT LESS VERBOSE!*/
    grid-column: 2/4;
    display: flex;
  }

  nav ul{
    display: flex;
    margin: 0px 0 0px auto;
    /*ALTERNATIVE TO LAST LINE:*/
    /*height: 100%;*/
    /*margin-top: 0px;*/
    /*margin-left: auto; !* With flexbox this push navbar to right. Auto indica agafar a l'esquerra tot l'espai lliure disponible com a marge -> Push right  *!*/
  }

  nav ul li{
    display: flex;
    align-items: center;
    padding: 0.5rem;
  }

  nav ul li:last-child{
    padding-right: 0.5rem;
  }

  nav ul li img{
    height:40px;
    margin-right: 0.5rem;
  }

  .avatar {
    border-radius: 50%;
  }

  nav>a {
    padding: 0.5rem;
    margin-right: auto;
    align-self: center;
  }

  nav ul li:hover, nav>a:hover {
    background-color: #367fa9;
  }

  footer {
    background-color: white;
    grid-row: 3;
    grid-column: 2/4;
  }
  main {
    background-color: #ecf0f5;
    grid-row: 2;
    grid-column: 2;
    /*grid-column-end: 3; NOT NEEDED 3 is nex value of 2 so default!*/
  }

  aside {
    color: white;
    background-color: #222d32;
  }

  .content-header { background-color: #d2d6de; }

  .left_sidebar {
    grid-row: 2/4;
    grid-column: 1;
  }

  .rigth_sidebar {
    grid-column: 3;
  }

  /*BADGES*/

  .label {
    border-radius: 0.25em;
    font-weight: 700;
    position: absolute;
    top: 9px;
    right: 7px;
    text-align: center;
    font-size: 9px;
    padding: 2px 3px;
    line-height: .9;
  }

  .label-success {
    background-color: #00a65a;
  }

  /* Responsive */

  @media (max-width: 400px) {
    .container {
      display: block;
    }
  }

  /*OFF CANVAS EXAMPLE: https://codepen.io/oknoblich/pen/klnjw--> */
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

</style>
