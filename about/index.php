<?php

include "localhost/config.php";
session_start();
// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: /login.php');
}
 ?>
<html>
<link href = '/default/default.css' rel = 'stylesheet' type = 'text/css'>
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
<title>About</title>
<style>
body{
    padding-bottom: 10%;
    }
#text{
    margin: 40px;
    font-family: 'Raleway', sans-serif;
    font-size: 150%;
  }
#text p {
    color: white;
    display: inline;
    line-height: 40px;
  }
#link {
  display: inline-block;
}

#link a{
    color: #7272e5;
    text-decoration: none;
    background-color: none;
  }

#link a:hover {
  background-color: #36393e;
  color: #e5e5e5;
  text-decoration: underline;

}

#vwa a{
 display: inline-block;
 text-decoration: none;
 background-color: none;
 color: white;
}

#vwa a:hover {
 background-color: #36393e;
}

</style>
<header>

<ul /*style = 'font-size: 150%'*/>
<li><a href = '/home'>Home</a></li>
<li><a href = '#'>Datalogger</a></li>
<li><a href = '/mirabalPass'>MirabalPass</a></li>
<li><a href = '#'>BugNotes</a></li>
<li style = 'float: right'><a class = 'active' href = '#'>About</a></li>
</ul>

</header>
<h1 style = 'font-size: 700%; margin-top: 60px;'>About</h1>
<body>
<div id= 'text'>
  <br>
  <br>
  <p>This website is created by the best web developer in the world, Alvaro on March 2019. </p>
  <p>It's a LAMP server, hosted on a RaspberryPi Zero W and you can find the source code on </p>
  <p><div id = "link"><a href = 'https://github.com/Alvarusky/html' target = 'blank'>Github.</a></div></p>
  <br>
  <p>I did this website because I wanted to learn how Internet works and host my programs such as "MirabalPass" or "mediaDHT11v3" on the web.</p>
  <p><div id = "vwa"><a href = '/test1/'> Se nota q es la leche.</a></div></p>
</div>
</body>
