<?php
  include('../nav.html');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>alvaro de miguel | index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Add CSS and fonts -->
    <link rel= 'stylesheet' href= '/fonts.css'>
    <link rel = 'stylesheet' href = '/home.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
          .card:hover{ 
              box-shadow: 0 8px 7px 0 rgba(0,0,0,0.05), 0 6px 10px 0 rgba(0,0,0,0.05);
              transition: all .1s ease-in-out;
    }
    </style>
  
  </head>
  <body>

    <div class='container mt-4'><a href='/'><< </a>/<a href='./'>hobbies</a>/</div>

    <div class='container-fluid mt-5'>
      <h1 class='display-4 text-center fw-bold mb-5'>index</h1>
    </div>

    <!-- Main text -->
    <div class='container-fluid'>
      <div class= 'row justify-content-center py-5'>
        <div class= 'col-8'>
          <p> I got many hobbies, as i said in the main page. I'm listing them down below so i can have them indexed.
              Individually developed projects aren't shown here but in the projects page (there ain't one yet cause 
              there ain't no individual projects for now).
          </p>
        </div>
      </div>
    </div>


    <!-- Hobbies list -->
    <div class= 'container'>
      <div class= 'row justify-content-around my-5'>
        
        <div class= 'col-md-4 col-sm my-5'>
          <div class= 'card h-100' >
            <img src="/images/admfotos/dingle_beach.jpg" class="card-img-top">
            <div class="card-body">
              <h5 class= 'card-title fw-bold'>Photography</h5>
              <a href="/hobbies/photography" class="stretched-link">/photography</a>
            </div>
          </div>
        </div> 
        
        <div class= 'col-md-4 col-sm my-5'>
          <div class= 'card h-100' >
            <img src="/images/blockchain&crypto.png" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title fw-bold">Blockchain&crypto</h5>
              <a href="/hobbies/blockchain&crypto" class="stretched-link">/blockchain&crypto</a>
            </div>
          </div> 
        </div>

        <div class= 'col-md-4 col-sm my-5'>
          <div class= 'card h-100' >
            <img src="/images/logo.png" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title fw-bold">Books & texts</h5>
              <a href="/hobbies/books&texts" class="stretched-link">/books&texts</a>
            </div>
          </div> 
        </div>

        <div class= 'col-md-4 col-sm my-5'>
          <div class= 'card h-100' >
            <img src="/images/logo.png" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title fw-bold">Music</h5>
              <a href="/hobbies/photography" class="stretched-link">/music</a>
            </div>
          </div> 
        </div>

      </div>
    </div>

  </body>
</html>