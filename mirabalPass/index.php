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

  <title>MirabalPass</title>

  <header>
    <ul /*style = 'font-size: 150%'*/>
      <li><a href = '/home'>Home</a></li>
      <li><a href = '#'>Datalogger</a></li>
      <li><a href = '#'>MirabalPass</a></li>
      <li><a href = '#'>BugNotes</a></li>
      <li style = 'float: right'><a class = 'active' href = '#'>About</a></li>
    </ul>

  </header>
  <h1 class = 'title'>MirabalPass</h1>
