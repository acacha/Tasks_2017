<template>
  <body>
  <div class="container">
    <header>
      <strong>Admin</strong>LTE
    </header>
    <nav class="header-nav">
      <a href="#">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
      </a>
      <ul>
        <li>
          <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2h16zm-4.37 9.1L20 16v-2l-5.12-3.9L20 6V4l-10 8L0 4v2l5.12 4.1L0 14v2l6.37-4.9L10 14l3.63-2.9z"/>
            </svg>
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

    <aside class="left_sidebar" :class="{ isOpen: menuOpen }">
      <div class="user-panel">
        <div class="pull-left">
          <img class="avatar" src="http://www.gravatar.com/avatar/046889f49471fd40d105eb76b9d83bf6.jpg" alt="sergiturbadenas@gmail.com">
        </div>
        <div class="pull-left info">
          <p>Sergi Tur Badenas</p>
          <svg height="14" width="14">
            <circle cx="7" cy="7" r="5" stroke="#3d763e" stroke-width="1" fill="#3d763e" />
          </svg>Online
        </div>
      </div>
      <form action="#" class="sidebar-form">
        <input type="text" placeholder="Search">
        <button type="submit" name="search" class="btn btn-flat">
          <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
        </button>
      </form>
      <nav class="sidebar-nav">
        <ul>
          <li class="header">Main Navigation</li>
          <li><a href="#dashboard"><svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm-5.6-4.29a9.95 9.95 0 0 1 11.2 0 8 8 0 1 0-11.2 0zm6.12-7.64l3.02-3.02 1.41 1.41-3.02 3.02a2 2 0 1 1-1.41-1.41z"/></svg> Dashboard</a></li>
          <li>
            <a href="#tasks">
            <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.03 2.6a3 3 0 0 1 5.94 0L15 3v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h1V3l2.03-.4zM5 6H4v12h12V6h-1v1H5V6zm5-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
            Tasks
            <span class="pull-right">
              <span class="badge badge-danger">4</span>
            </span>
            </a>
          </li>
          <li>
            <a href="#proves">Proves
            <span class="pull-right">
              <span class="badge badge-successfull">new</span>
            </span>
            </a>
          </li>
          <li><a href="#tokens">Tokens</a></li>
          <li><a href="#other">Other</a></li>
          <li class="treeview">
            <div class="pull-right pull-right-vertical-center">
              <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
            <a href="#other">SubList Open</a>
            <ul>
              <li>
                <a href="#submenu1">
                  <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-3a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm4 2.75V20l-4-4-4 4v-8.25a6.97 6.97 0 0 0 8 0z"/></svg>
                  Submenu 1
                </a>
              </li>
              <li>
                <a href="#submenu1">
                  <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-3a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm4 2.75V20l-4-4-4 4v-8.25a6.97 6.97 0 0 0 8 0z"/></svg>
                  Submenu 2
                </a>
              </li>
              <li>
                <a href="#submenu1">
                  <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12a6 6 0 1 1 0-12 6 6 0 0 1 0 12zm0-3a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm4 2.75V20l-4-4-4 4v-8.25a6.97 6.97 0 0 0 8 0z"/></svg>
                  Submenu 3
                </a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <div class="pull-right pull-right-vertical-center">
              <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.05 9.293L6.343 10 12 15.657l1.414-1.414L9.172 10l4.242-4.243L12 4.343z"/></svg>
            </div>
            <a href="#other">SubList Closed</a>
            <ul style="display:none">
              <li><a href="#submenu1">Submenu closed 1</a></li>
              <li><a href="#submenu2">Submenu closed 2</a></li>
              <li><a href="#submenu3">Submenu closed 3</a></li>
            </ul>
          </li>
          <li class="header">Secondary Navigation</li>
          <li><a href="#link1">Link 1</a></li>
          <li><a href="#link2">Link 2</a></li>
          <li><a href="#link3">Prova link superllarg a veure si dona pel cul</a></li>
        </ul>
      </nav>
    </aside>
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

  *, *:after, *:before {
    box-sizing: border-box;
  }

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

  .pull-left {
    float: left;
  }

  .pull-right {
    float: right;
  }

  .pull-right-vertical-center {
    margin-top: 10px;
    padding: .2em .6em .3em;
  }

  .icon, .icon-sidebar {
    display: inline-block;
    fill: currentColor;
  }

  .icon {
    height: 1.25rem;
    width: 1.25rem;
  }

  .icon-sidebar {
    height: 1rem;
    width: 1rem;
    margin-right: 0.5em;
    /*vertical-align: middle;*/
  }

  .container {
    display: grid;
    grid-template-columns: 230px 1fr 200px;
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

  header:hover {
    background-color: #357ca5;
    cursor: pointer;
  }

  ul,li{
    list-style: none;
  }

  ul {
    padding: 0;
    margin: 0;
  }

  .user-panel {
    padding: 10px;
    overflow: hidden;
  }

  .user-panel img {
    width: 45px;
    height: 45px;
  }

  .user-panel .info {
    color: #fff;
    padding: 5px 5px 5px 15px;
    line-height: 1;
    position: absolute;
    left: 55px;
    font-size: 11px;
  }

  .info p {
    margin: 0 0 10px;
    font-weight: 600;
    font-size: 14px;
  }

  .sidebar-form  {
    padding: 12px 5px 12px 15px;
    display: flex;
  }

  .sidebar-form input[type="text"]:focus {
    background-color: #fff;
    color: #666;
  }

  .sidebar-form input[type="text"] {
    box-shadow: none;
    background-color: #374850;
    border: 1px solid transparent;
    height: 35px;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
    padding: 12px 5px 12px 15px;
  }

  .sidebar-form .btn {
    color: #999;
    background-color: #374850;
    box-shadow: none;
    outline:none;
    border: 1px solid transparent;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
  }

  .sidebar-nav {
    /*display: flex;*/
  }

  .sidebar-nav ul li {
    background-color: #2d3c42;
  }

  .sidebar-nav ul li:hover {
    background-color: #222d32;
    cursor: pointer;
  }

  .sidebar-nav ul li a {
    color: #b8c7ce;
    border-left: 3px solid transparent;
    display: block;
    padding: 12px 15px 12px 15px;
  }

  .sidebar-nav ul li a:hover {
    border-left: 3px solid #3c8dbc;
  }

  .sidebar-nav ul li.header {
    color: #4b646f;
    background: #1a2226;
    text-transform: uppercase;
    font-size: 12px;
    padding-left: 15px;
    padding-top: 10px;
    padding-bottom: 10px;
    cursor: auto;
  }

  .header-nav {
    color: white;
    background-color: #3c8dbc;
    grid-row: 1;
    /*grid-column-start: 1;*/
    /*grid-column-end: 4;  NEXT LINES ARE THE SAME BUT LESS VERBOSE!*/
    grid-column: 2/4;
    display: flex;
  }

  .header-nav a {
    height: 100%;
    display:flex;
    align-items: center;
  }

  .header-nav ul{
    display: flex;
    margin: 0px 0 0px auto;
    /*ALTERNATIVE TO LAST LINE:*/
    /*height: 100%;*/
    /*margin-top: 0px;*/
    /*margin-left: auto; !* With flexbox this push navbar to right. Auto indica agafar a l'esquerra tot l'espai lliure disponible com a marge -> Push right  *!*/
  }

  .header-nav ul li{
    display: flex;
    align-items: center;
    padding: 0.5rem;
  }

  .header-nav ul li:last-child{
    padding-right: 0.5rem;
  }

  .header-nav ul li img{
    height:40px;
    margin-right: 0.5rem;
  }

  .header-nav>a {
    padding: 0.5rem;
    margin-right: auto;
    align-self: center;
  }

  .header-nav ul li:hover, nav>a:hover {
    background-color: #367fa9;
  }

  .avatar {
    border-radius: 50%;
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



  .badge {
    border-radius: 0.25em;
    font-weight: 700;
    text-align: center;
    font-size: 9px;
    padding: .2em .6em .3em;
    line-height: .9;
    color: #fff;
  }

  .badge-danger {
    background-color: #dd4c39;
  }

  .badge-successfull {
    background-color: #2aa65a;
  }

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
