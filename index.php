<!DOCTYPE html>
<html>
<title>Chancletas</title>
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<style>

header {
  background-color:  #36393e;
}

body, html {
  margin:0;
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
  background-color: green;
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
  margin: 20px;
 padding-left:23%;
 position: fixed;
// line-height:100px;
 text-align:center;
 font-family: 'Indie Flower', cursive;
 font-size: 700%;
 color: #ffffff; // #a0a4ac;
}

img {
  float:left;
  width: 180px;
  height: 180px;
  margin: 0px;
  padding-left: 10%;
}

</style>
<header>
<img src = 'images/logo.png'><h1>Chancletas Chillonas</h1>

<div id= 'navbar'>
<a class = 'active' href = 'index.php'>Home</a></li>
<a href = 'data'>Datalogger</a>
<a href = 'default.php'>Default Page</a>
<a href = 'login.php'>Index.html</a>
<a style = 'float:right' href = 'about.php'>About</a>
</div>

</header>
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
</html>
