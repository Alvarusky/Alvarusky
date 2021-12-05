<!doctype html>
<html>
  <head>
    <title>HowTo: CryptoCharts | Alvarusky</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Add jQuery, bootstrap and custom fonts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel= 'stylesheet' href= '/fonts.css'>
    <link rel = 'stylesheet' href = ''>
  </head>
  <body class= 'pt-5'>
    <!-- Navigation Bar -->
    <nav class= 'navbar navbar-expand-md fixed-top navbar-dark bg-dark'>
      <a class= 'navbar-brand' href='#'>
        <img src= '/images/logo.jpeg' width= '30' height= '30' alt='' loading='lazy'>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class= 'collapse navbar-collapse' id= 'navbarTogglerDemo02'>
        <div class='navbar-nav mr-auto openSans'>
          <a class = 'nav-item nav-link mx-3 active' href = '/'>Home</a>
          <a class= 'nav-item nav-link mx-2' href = '#'>DHT11-T&H</a>
          <a class= 'nav-item nav-link mx-2' href = '#'>MirabalPass</a>
          <a class= 'nav-item nav-link mx-2' href = '#'>CryptoCharts</a>
        </div>
        <div class= 'navbar-nav ml-auto openSans'>
          <a class= 'nav-item nav-link mx-2'  href = '/about'>About</a>
          <span class= 'navbar-text mx-2'>|</span>
          <a class= 'nav-item nav-link mx-2' href= '#' data-toggle='modal' data-target= '#logoutModal'>Log Out</a>
        </div>
      </div>
    </nav>


    <!-- Log Out Modal -->
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


    <!-- Main content -->
    <div class= 'container-fluid pt-5'>
	<a href='/how-to/' class='ml-3'><img src='/images/arrow-left-blue.svg' onmouseover="hover(this);" onmouseout="unhover(this);" /></a>
        <p class= 'text-right openSans text-muted'>18/06/2020</p>
      </div>
      <h1 class= 'text-center openSans display-4'>Making Cryptocurrency Charts</h1>
      <br>
      <hr class='my-4'>

      <div class='container raleway'>
	<p class='m-5'>Making this charts was fairly easy, so I don't think you'll have any difficulties.
           Also bear in mind that I'm using <a href= 'https://php.net' target='blank'>PHP</a> as my serverside language.
	   Anyhow, if you're using other language, the libraries I am working with support for many languages.
	</p>
	<p class='m-5'>Firstly, to make the charts, I implemented the <a href='https://chartjs.org' target='blank'>ChartJS</a> API,
	  which makes it incredibly easy to build animated and responsive charts. The problem here is
	  that I was getting the coin values from PHP, and since ChartJS works with Javascript,
	  it didn't have access to the data I was getting from PHP. 
	  <br>
	  So from here I had to options: the first one was JSON-encoding the
	  desired data, passing it to Javascript, and decoding it again.
	  The second one was to make use of a github repository (<a href='https://github.com/halfpastfouram/phpchartjs' target='blank'>PHPChartJS</a>),
	  to code the charts directly from PHP.</p>
	  <p class='m-5'> I chose the latter for three reasons:
	  <br>
	  <br>
	  - Firstly, it looked easier.
	  <br>
	  - Secondly, it would save me from having to write
	  more code, which, by the way, would be harder to read if you didn't know PHP very well (which is my case).
          <br>
	  - And lastly, the resulting code was way prettier than otherwise.</p>
	  <p class='m-5'>Alright, so once I figured out how to display data in form of a chart,
	  I just had to add the data to it!
	  <br>
	  <br>
	  To do so I'm getting the coin prices through this <a href='https://www.cryptocurrencychart.com/api/documentation' taget='blank'>API,</a>
	  along with its <a href='https://gitlab.com/bastiaangrutters/cryptocurrencychart-api' target='blank'>library</a>
	  to access it with PHP. But if you see the examples given in the library, none of them
	  are caching the response, which makes the page load really slowly. And the way
	  to prevent this is by saving the API response to my own server for a given time,
	  in my case one day, instead of making a request each time someone visits
	  it.</p>
	  <p class='m-5'>Since I'm running <a href='https://www.mysql.com/' target='blank'>MySQL</a> as my database, I decided to save the response 
	  into a table, which would be updated each day by a <a href='' target='blank'>cron job</a>. 
	  Yet, I had to <a href='https://www.php.net/manual/en/function.serialize.php' target='blank'>serialize</a> it before saving it to MySQL.
	  <br>
	  After that, I just had to get the data from my own database and make the chart. And after 
	  some syntax issues with PHP, the charts were made and the cron job running.</p>
	  <p class='m-5'>You can see the results in the <a href='/cryptoChart/' >CryptoCharts</a> page.</p>
	</div>
    </div>

    <script>
      function hover(element) {
        element.setAttribute('src', '/images/arrow-left.svg');
      }
      function unhover(element) {
        element.setAttribute('src', '/images/arrow-left-blue.svg');
      }
    </script>
  </body>

</html>
