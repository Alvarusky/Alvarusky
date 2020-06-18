<?php

include "localhost/config.php";
session_start();
// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: /login.php');
}
 ?>
<html>

<!-- Add jQuery, bootstrap and custom fonts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale= 1">
<link href="/fonts.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale= 1">
<title>About</title>

<header>

<!-- Navigation Bar -->
<nav class= 'navbar navbar-expand-md fixed-top navbar-dark bg-dark'>
  <a class= 'navbar-brand' href='/home/'>
        <img src= '/images/logo.jpeg' width= '30' height= '30' alt='' loading='lazy'>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class= 'collapse navbar-collapse' id= 'navbarTogglerDemo02'>
    <div class='navbar-nav mr-auto openSans'>
      <a class = 'nav-item nav-link mx-3' href = '/home/'>Home</a>
      <a class= 'nav-item nav-link mx-2' href = '#'>DHT11-T&H</a>
      <a class= 'nav-item nav-link mx-2' href = '#'>MirabalPass</a>
      <a class= 'nav-item nav-link mx-2' href = '/cryptoChart/'>CryptoCharts</a>
    </div>
    <div class= 'navbar-nav ml-auto'> 
      <a class= 'nav-item nav-link mx-2 active openSans'  href = '/about/'>About</a>
      <span class= 'navbar-text mx-2'>|</span>
      <a class= 'nav-item nav-link mx-2' href= '#' data-toggle='modal' data-target= '#logoutModal'>Log Out</a>
    </div>
  </div>
</nav>

</header>
<body class= 'pt-5'>

<!-- Log Out modal -->
<div class= 'modal fade' id= 'logoutModal' tabindex= '-1' role= 'dialog' aria-labelledby= 'logoutModalLabel' aria-hidden= 'true'>
  <div class= 'modal-dialog'>
    <div class= 'modal-content bg-dark'>
      <div class= 'modal-header'>
        <h4 class= 'modal-title text-white openSans' id= 'logoutModalLabel'>Sign Up</h4>
        <button type= 'button' class= 'close' data-dismiss= 'modal' aria-label= 'Close'> 
          <span aria-hidden= 'true' style= 'color: white'>&times;</span>
        </button>
      </div>
      <div class= 'modal-body'>
	<p class= 'text-white raleway'> Are you sure you wanna log out? You won't be able to see any content published on this page.</p>
	<p class= 'text-white raleway'> Press "Log Out" below to end your current session</p>
      </div>
      <div class= 'modal-footer openSans'>
        <button type= 'button' class= 'btn btn-outline-secondary' data-dismiss= 'modal'>Cancel</button>
        <button type= 'button' class= 'btn btn-light' onclick= 'window.location="/logout.php"'>Log Out</button>
      </div>
    </div>
  </div>
</div>


  <div class='container-fluid mt-5'>
  <h1 class='display-2 text-center openSans'>About</h1>
  <hr class= 'my-4 ml-5 mr-5'> 
  <div class= 'container'>
    <p class= 'text-left raleway m-5'>This website was first created by Alvaro de Miguel (<a href= 'https://twitter.com/_alvarodemiguel' target= 'blank'>@_alvarodemiguel</a>) on March 2019.
    It's a LAMP server, hosted on a RaspberryPi Zero W, and you can find the source code on 
    <a href = 'https://github.com/Alvarusky/html' target = 'blank'>Github.</a>
    I built this website cause I wanted to learn how Internet works and host my programs such as "CrytoCharts" or "DHT11-T&H" on the web.
    </p>
    <p class= 'text-left raleway m-5'> I am a spanish teen who loves coding, and so I decided to build my personal site.
      I'm also kind of entrepreneur, and <a href="https://worldbook.ddns.net/" target= "blank">WorldBook</a>
      is my first startup.
      At this time (10/6/2020) I'm only 16, so I've got no higher education, however I'm planning to take a double major in physics and math in Madrid.
    </p>
    </div>
  </div>
</body>
</html>
