<?php

include "localhost/config.php";
session_start();
// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: /login.php');
}
 ?>
<!DOCTYPE html>
<html>
<title>DemiChanclas</title>
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Laila:600" rel="stylesheet">
<link rel = 'stylesheet' href = '/home/home.css'></style>
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
</script>
<script type = 'text/javascript' src = 'mirabalPass.js'></script>
</html>
