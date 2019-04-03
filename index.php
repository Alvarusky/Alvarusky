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
}

ul {
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
  list-style-type: none;
  margin: 0px;
  padding: 0;
  overflow: hidden;
  background-color: #2b2d31; //#4a4c51;
//Código para ponerle sombra a la navigation bar.
  -webkit-box-shadow: 0 8px 6px -6px #999;
  -moz-box-shadow: 0 8px 6px -6px #999;
   box-shadow: 0 8px 6px -6px #999;
}

li {
  float: left;
}

li a {
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
li a:hover {
  background-color: #4a4c51;
}

.active {
  background-color: green;
}

header h1 {
 margin: 0;
// line-height:100px;
 text-align:center;
 font-family: 'Indie Flower', cursive;
 font-size: 700%;
 color: #ffffff; // #a0a4ac;
}

</style>
<header>
<h1>chancletas chillonas</h1>

<ul>
<li><a class = 'active' href = 'index.php'>Home</a></li>
<li><a href = 'data'>Datalogger</a></li>
<li><a href = 'default.php'>Default Page</a></li>
<li><a href = 'index'>Index.html</a></li>
<li style = 'float: right'><a href = 'about.php'>About</a></li>
</ul>

</header>
