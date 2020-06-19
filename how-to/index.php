  <?php

include "/config.php";
session_start();
// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: /login.php');
}
 ?>
<!doctype html>
<html>
  <head>

    <title>How To's | Alvarusky</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Add jQuery, bootstrap and custom fonts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel= 'stylesheet' href= '/fonts.css'>

    </head>
    <body class= 'pt-5'>

      <!-- Navigation Bar -->
      <nav class= 'navbar navbar-expand-md fixed-top navbar-dark bg-dark'>
        <a class= 'navbar-brand' href='/home'>
          <img src= '/images/logo.jpeg' width= '30' height= '30' alt='' loading='lazy'>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class= 'collapse navbar-collapse' id= 'navbarTogglerDemo02'>
          <div class='navbar-nav mr-auto openSans'>
            <a class = 'nav-item nav-link mx-3' href = '/home/'>Home</a>
            <a class= 'nav-item nav-link mx-2' href = '/dht11'>DHT11-T&H</a>
            <a class= 'nav-item nav-link mx-2' href = '/cryptoChart'>CryptoCharts</a>
            <a class= 'nav-item nav-link mx-2 active' href = '#'>How To's</a>
          </div>
          <div class= 'navbar-nav ml-auto openSans'>
            <a class= 'nav-item nav-link mx-2'  href = '/about'>About</a>
            <span class= 'navbar-text mx-2'>|</span>
            <a class= 'nav-item nav-link mx-2' href= '#' data-toggle='modal' data-target= '#logoutModal'>Log Out</a>
          </div>
        </div>
      </nav>

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

    <!-- Main Content -->
    <div class='container-fluid mt-5'>
      <a href='/home/' class='ml-3'><img src='/images/home-blue.svg' onmouseover="hover(this);" onmouseout="unhover(this);" /></a>
      <h1 class='display-3 text-center openSans'>How To's</h1>
      <br>
      <br>
      <div class='container pr-5 pl-5'>
	<ul class='list-group list-group-flush'>
	  <li class='list-group-item'></li>
	  <li class='list-group-item h3 openSans' id='cryptochart'>
	    <a class='text-decoration-none' href='cryptocharts' style='color:#000000;'>Making Cryptocurrency Charts</a>
	  </li>
	</ul>
      </div>
    </div>

    <script>
      function changeColorOnMouseOver(id){
        document.getElementById(id).addEventListener('mouseover',
	  function(){
	    document.getElementById(id).style.backgroundColor="#F5EDE3";
	    });
      }

      function changeColorOnMouseOut(id){
	document.getElementById(id).addEventListener('mouseout',
          function(){
            document.getElementById(id).style.backgroundColor="#ffffff";
            });
      }

      changeColorOnMouseOver('cryptochart');
      changeColorOnMouseOut('cryptochart');

       function hover(element) {
        element.setAttribute('src', '/images/home.svg');
      }
      function unhover(element) {
        element.setAttribute('src', '/images/home-blue.svg');
      }

    </script>
  </body>

</html>
