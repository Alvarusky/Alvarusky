<?php
// Check if user is logged in
include "localhost/config.php";
session_start();
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
    <!-- Navigation Bar -->
    <ul /*style = 'font-size: 150%'*/>
      <li><a href = '/home'>Home</a></li>
      <li><a href = '#'>Datalogger</a></li>
      <li><a class = 'active' href = '#'>MirabalPass</a></li>
      <li><a href = '#'>BugNotes</a></li>
      <li style = 'float: right'><a href = '/about'>About</a></li>
    </ul>
  </header>

  <h1 style = 'font-size: 500%'>MirabalPass</h1>
  <br />
  <br />
  <!-- Mirabal codes for today -->
  <div id = 'codes'>
