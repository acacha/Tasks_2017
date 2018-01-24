<template>
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
      <router-link tag="li" to="/landing">
        <a href="/landing">
          <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.03 2.6a3 3 0 0 1 5.94 0L15 3v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h1V3l2.03-.4zM5 6H4v12h12V6h-1v1H5V6zm5-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
          Landing page
        </a>
      </router-link>
      <router-link tag="li" to="/login">
        <a href="/login">
          <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.03 2.6a3 3 0 0 1 5.94 0L15 3v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h1V3l2.03-.4zM5 6H4v12h12V6h-1v1H5V6zm5-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
          Login
        </a>
      </router-link>
      <router-link tag="li" to="/cards">
        <a href="/cards">
          <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.03 2.6a3 3 0 0 1 5.94 0L15 3v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h1V3l2.03-.4zM5 6H4v12h12V6h-1v1H5V6zm5-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
          Cards
        </a>
      </router-link>
      <router-link tag="li" to="/dropdown">
        <a href="/dropdown">
          <svg class="icon-sidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7.03 2.6a3 3 0 0 1 5.94 0L15 3v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h1V3l2.03-.4zM5 6H4v12h12V6h-1v1H5V6zm5-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg>
          Dropdown
        </a>
      </router-link>
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
</template>

<script>
  export default {
    name: 'NavSidebar',
    data () {
      return {
        items: []
      }
    }
  }
</script>

<style>


</style>
