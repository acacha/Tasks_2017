<template>
  <body>
    <span class="login-title"><b>Admin</b>LTE</span>
    <div class="box">
      <div class="box-header">
        <div class="box-title">Sign in to start your session</div>
      </div>
      <div class="box-body">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <div class="row">
          <div class="remember">
            <input type="checkbox" class="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
          </div>
          <button class="btn btn-primary push-right">Sign in</button>
        </div>
      </div>
      <div class="box-footer">
        <span class="center mb-1">- OR -</span>
        <button class="btn-social btn-facebook">Sign in using facebook</button>
        <button class="btn-social btn-google">Sign in using Google</button>
        <a href="#">I forgot my password</a>
        <a href="#">Register a new membership</a>
      </div>
    </div>
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

html,body {
  background-color: #d2d6de;
  height: 100%;
  line-height: 1.15;
  display: flex;
  flex-direction: column;
}

body { /* Body here acts as container */
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
  font-weight: 400;
  font-size: 14px;
  color: #333;
}

.center {
  text-align: center;
}

.mb-1 {
  margin-bottom: 0.5em;
}

.checkbox {
  -moz-appearance: none;
  -webkit-appearance: none;
  background-color: #fafafa;
  border: 1px solid #cacece;
  border-radius: 3px;
  box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
  padding: 9px;
  position: relative;
  width: 1em;
  margin-right: 0.5em;
}

.checkbox:active, .regular-checkbox:checked:active {
  box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px 1px 3px rgba(0,0,0,0.1);
}

.checkbox:checked {
  background-color: #e9ecee;
  border: 1px solid #adb8c0;
  box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05), inset 15px 10px -12px rgba(255,255,255,0.1);
  color: #99a1a7;
}

.checkbox:checked:after {
  content: '\2714';
  font-size: 14px;
  position: absolute;
  top: 0px;
  left: 3px;
  color: #99a1a7;
}

.login-title {
  font-size: 35px;
  margin-bottom: 1em;
}

.box {
  display:flex;
  flex-direction:column;
  background-color: #fff;
  padding: 20px;
  width: 460px;
  margin-bottom: 65%;
}

.box-title {
  text-align: center;
  padding: 0 20px 20px 20px;
}

.box-body {
  display:flex;
  flex-direction:column;
}

.box-footer {
  display:flex;
  flex-direction:column;
}

input {
  margin-bottom: 15px;
  width: 100%;
  border: 1px solid #ccc;
  padding: 6px 12px;
  box-shadow: none;
  background-color: #fff;
}

.btn,.btn-social {
  border: 1px solid transparent;
  border-radius: 0;
  margin-bottom: 0.5em;
  cursor: pointer;
  overflow: hidden;
  text-overflow: ellipsis;
  box-shadow: none;
  font-size: 14px;
  font-weight: 400;
  padding: 6px 12px;
}

.btn {

}

.btn-social {

}

.btn-google {
  background-color: #dd4b39;
  color: #fff;
}

.btn-facebook {
  background-color: #3b5998;
  color: #fff;
}

.btn-primary {
  color: #fff;
  background-color: #3c8dbc;
  border-color: #367fa9;
}

.btn-primary:hover {
  background-color: #367fa9;
  border-color: #204d74;
}

.row {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
}

.remember {
  display:flex;
  align-content: center;
  align-items: center;
}

label {
  /*white-space:nowrap;*/
}

.push-right {
  margin-left: auto;
}

@media (max-width: 768px) {
  .box {
    width: 90%;
  }
}

a {
  color: #337ab7;
  text-decoration: none;
}

a:hover, a:active, a:focus {
  outline: none;
  text-decoration: none;
  color: #72afd2;
}

/* Include padding and border in the element's total width and height:
 http://es.learnlayout.com/box-sizing.html
 https://css-tricks.com/box-sizing/
 */
* {
  box-sizing: border-box;
}

/* Més compatible: Frameworks com Bootstrap incorporen*/

*, *:before, *:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

</style>
