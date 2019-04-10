<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: /home');
}
<!DOCTYPE html>
<html>
<title>DemiChanclas</title>
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Laila:600" rel="stylesheet">
<style>

header {
  background-color:  #36393e;
  margin: 0 auto;
  padding: 0 auto;
}

body, html {
  margin: 0;
  padding: 0;
  background-color:  #36393e;
}

#navbar {
  width: 100%;
  overflow: hidden;
  background-color: #2b2d31; //#4a4c51;
//Código para ponerle sombra a la navigation bar.
  -webkit-box-shadow: 0 8px 6px -6px #999;
  -moz-box-shadow: 0 8px 6px -6px #999;
   box-shadow: 0 8px 6px -6px #999;
}

#navbar a {
  float: left;
  margin 0;
  display: block;
  color: white;
  text-align: center;
  padding: 20px;
  font-size: 150%;
  font-family: 'Indie Flower';
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
#navbar a:hover {
  background-color: #4a4c51;
}

#navbar .active {
  background-color:  #6666ff;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}

header h1 {
 margin: 15px;
 padding-left:5%;
 text-align:center;
 font-family: 'Indie Flower';
 font-size: 700%;
 color: #ffffff; // #a0a4ac;
}

img {
  position: absolute;
  float:left;
  width: 180px;
  top: 0px;
  height: 180px;
  padding-left: 100px;
}
#pass {
  margin-left: 13%;
  margin-top: 20px;
  font-family: 'Raleway';
  font-size: 160%;
  color: white;
}
#pass pre{
  display: inline;
  padding-left: 15px;
  font-family: 'Raleway';
}

#pass p{
  display: inline-block;
  font-size: 110%;
  padding-top: 0px;
}

.mpass{
  margin-top: 45  px;
  margin-left: 12%;
  color: #1bbe1b;
  font-family: 'Laila';
  font-size: 400%;
}

</style>
<header>
<a href="index.php" style = "text-decoration: none">
  <img src = '/images/logo.png'>
  <h1>Chancletas Chillonas</h1>
</a>
<div id= 'navbar'>
<a class = 'active' href = 'index.php'>Home</a>
<a href = 'data'>Datalogger</a>
<a href = '/default/default.php'>Default Page</a>
<a href = 'login.php'>Index.html</a>
<a style = 'float:right' href = '/about'>About</a>
</div>

</header>
<body>
  <h1 class="mpass">MirabalPass</h1>
  <div id = 'pass'>
  <p><b> v2 = </b></p><pre style = 'display: inline' id = 'v2'></pre>
  <p><b> &emsp;&ensp;&ensp;v3 = </b></p><pre id = 'v3'></pre>
  <br>
  <p><b> v4 = </b></p><pre id = 'v4'></pre>
  <p><b> &emsp;&ensp;&ensp;v5 = </b></p><pre id = 'v5'></pre>
  <br>
  <p><b> v7 = </b></p><pre id = 'v7'></pre>
  <p><b> &emsp;&ensp;&ensp;v8 = </b></p><pre id = 'v8'></pre>
  </div>
</body>
<br>
<br><br>
<script>
// When the user scrolls the page, execute myFunction
window.onscroll = function() {stickyNavBar()};

// Get the navbar
var navbar = document.getElementById('navbar');

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyNavBar() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add('sticky')
  } else {
    navbar.classList.remove('sticky');
  }
}

mirabalPass();

function mirabalPass() {

  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth() + 1;
  var v2, v3, v4, v5, v7, v8;

  calc = (200*day)+(3*month);
  v2 = 20000 + calc;
  v3 = 30000 + calc;
  v4 = 40000 + calc;
  v5 = 50000 + calc;
  v7 = 70000 + calc;
  v8 = 80000 + calc;

  document.getElementById('v2').innerHTML = v2;
  document.getElementById('v3').innerHTML = v3;
  document.getElementById('v4').innerHTML = v4;
  document.getElementById('v5').innerHTML = v5;
  document.getElementById('v7').innerHTML = v7;
  document.getElementById('v8').innerHTML = v8;
}
</script>
</html>
