<?php
// Check if user is logged in
include "localhost/config.php";
session_start();
if(!isset($_SESSION['uname'])){
    header('Location: /login.php');
}
 ?>
 <html>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href = '/default/default.css' rel = 'stylesheet' type = 'text/css'>
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">

  <title>MirabalPass</title>

  <header>
    <!-- Navigation Bar -->
    <ul /*style = 'font-size: 150%'*/>
      <li><a href = '/home'>Home</a></li>
      <li><a href = '#'>Datalogger</a></li>
      <li><a class = 'active' href = '#'>BugNotes</a></li>
      <li style = 'float: right'><a href = '/about'>About</a></li>
    </ul>
  </header>

  <h1 style = 'font-size: 500%; margin-top: 100px'>BugNotes</h1>
  <br />
  <br />
  <!-- Mirabal codes for today -->
  <div id = 'codes'>
