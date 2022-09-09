<?php
  include('../../nav.html');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>alvaro de miguel | making cryptocurrency charts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Add CSS and fonts -->
    <link rel= 'stylesheet' href= '/fonts.css'>
    <link rel = 'stylesheet' href = '/home.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  </head>
  <body>

    <!-- Main content -->
    <div class='container mt-4'>
      <a href='../../'><< </a>/<a href='../'>how to's</a>/<a href='./'>making cryptocurrency charts</a>
    </div>
    <div class='container-fluid mt-5'>
      <h1 class='display-4 text-center fw-bold'>Making cryptocurrency charts</h1>
      <p class='text-center mb-5'> 18/06/2020 </p>
    </div>

    <div class= 'container-fluid'>
      <div class= 'row justify-content-center pt-5'>
        <div class= 'col-8'>
          <p>Making this charts was fairly easy, so I don't think you'll have any difficulties.
            Also bear in mind that I'm using <a href= 'https://php.net' target='blank'>PHP</a> as my serverside language.
            Anyhow, if you're using other language, the libraries I am working with support for many languages.
          </p>
          <p>Firstly, to make the charts, I implemented the <a href='https://chartjs.org' target='blank'>ChartJS</a> API,
            which makes it incredibly easy to build animated and responsive charts. The problem here is
            that I was getting the coin values from PHP, and since ChartJS works with Javascript,
            it didn't have access to the data I was getting from PHP. 
          <br>
            So from here I had to options: the first one was JSON-encoding the
            desired data, passing it to Javascript, and decoding it again.
            The second one was to make use of a github repository (<a href='https://github.com/halfpastfouram/phpchartjs' target='blank'>PHPChartJS</a>),
            to code the charts directly from PHP.
          </p>
          <p> I chose the latter for three reasons:
          <br>
          <br>
            - Firstly, it looked easier.
          <br>
            - Secondly, it would save me from having to write
            more code, which, by the way, would be harder to read if you didn't know PHP very well (which is my case).
                <br>
            - And lastly, the resulting code was way prettier than otherwise.</p>
          <p>Alright, so once I figured out how to display data in form of a chart,
            I just had to add the data to it!
          <br>
          <br>
            To do so I'm getting the coin prices through this <a href='https://www.cryptocurrencychart.com/api/documentation' taget='blank'>API,</a>
            along with its <a href='https://gitlab.com/bastiaangrutters/cryptocurrencychart-api' target='blank'>library</a>
            to access it with PHP. But if you see the examples given in the library, none of them
            are caching the response, which makes the page load really slowly. And the way
            to prevent this is by saving the API response to my own server for a given time,
            in my case one day, instead of making a request each time someone visits
            it.
          </p>
          <p>Since I'm running <a href='https://www.mysql.com/' target='blank'>MySQL</a> as my database, I decided to save the response 
            into a table, which would be updated each day by a <a href='' target='blank'>cron job</a>. 
            Yet, I had to <a href='https://www.php.net/manual/en/function.serialize.php' target='blank'>serialize</a> it before saving it to MySQL.
          <br>
            After that, I just had to get the data from my own database and make the chart. And after 
            some syntax issues with PHP, the charts were made and the cron job running.</p>
          <p>You can see the results in the <a href='/hobbies/blockchain&crypto/cryptoCharts/' >CryptoCharts</a> page.</p>
        </div>
      </div>

      <div class='container mt-5 mb-4'><a href='../../'><< </a>/<a href='../'>how to's</a>/<a href='./'>making cryptocurrency charts</a></div>
    </div>


  </body>
</html>
