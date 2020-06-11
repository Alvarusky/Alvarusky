<?php
// Check if user is logged in or not
include "localhost/config.php";
session_start();

if(isset($_SESSION['uname'])){
    header('Location: /home');
}
?>
<html style= 'height: 100%;'>

<!-- Add jQuery, bootstrap and custom fonts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="/fonts.css" rel="stylesheet">

<title>DemiChanclas</title>

<header>

<!-- Navbar -->
<nav class= 'navbar navbar-expand-md fixed-top navbar-dark bg-dark'>
  <a class= 'navbar-brand' href='#'>
        <img src= '/images/logo.png' width= '30' height= '30' alt='' loading='lazy'>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTo$
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class= 'collapse navbar-collapse' id= 'navbarTogglerDemo02'>
    <div class='navbar-nav mr-auto openSans'>
      <a class = 'nav-item nav-link mx-3 active' href = '/home/index.php'>Home</a>
      <a class= 'nav-item nav-link mx-2' href = '#'>DHT11-T&H</a>
      <a class= 'nav-item nav-link mx-2' href = '#'>MirabalPass</a>
      <a class= 'nav-item nav-link mx-2' href = '#'>CryptoCharts</a>
    </div>
    <div class= 'navbar-nav ml-auto openSans'>
      <a class= 'nav-item nav-link mx-2'  href = '/about'>About</a>
      <span class= 'navbar-text mx-2'>|</span>
      <a class= 'nav-item nav-link mx-2' href= '#' data-toggle= 'modal' data-target='#signupModal'>Sign Up</a>
    </div>
  </div>
</nav>

</header>

<body style=' background-color:#36393e;'>

<!-- Sign Up modal -->
<div class= 'modal fade' id= 'signupModal' tabindex= '-1' role= 'dialog' aria-labelledby= 'signupModalLabel' aria-hidden= 'true'>
  <div class= 'modal-dialog'>
    <div class= 'modal-content bg-dark'>
    <form method="post" action="">
      <div class= 'modal-header'>
        <h4 class= 'modal-title text-white openSans' id= 'signupModalLabel'>Create New Account</h4>
        <button type= 'button' class= 'close' data-dismiss= 'modal' aria-label= 'Close'> 
	  <span aria-hidden= 'true' style= 'color: white'>&times;</span>
	</button>
      </div>
      <div class= 'modal-body raleway'>
        <!-- Sign Up form -->
          <div class= 'form-group'>
                <label for= 'username' class= 'text-white openSans'>Username</label>
                <input type="text" class="form-control" id="signup_txt_uname" name="signup_txt_uname" placeholder="Username" />
          </div>
          <div class= 'form-group'>
                <label for= 'password' class= 'text-white openSans'>Password</label>
                <input type="password" class="form-control" id="signup_txt_pwd" name="signup_txt_pwd" placeholder="Password"/>
		<small class= 'form-text text-danger' id= 'signError'></small>
          </div>
      </div>
      <div class= 'modal-footer openSans'>
	<button type= 'button' class= 'btn btn-outline-secondary' data-dismiss= 'modal'>Cancel</button>
	<button type= 'submit' class= 'btn btn-light' name= 'but_signup' id= 'but_signup'>Create account</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Login form -->
  <div class='h-100 d-flex justify-content-center align-items-center'>
    <div class= 'card text-white bg-dark'>
      <div class= 'card-body'>
       <form method="post" action="#">
        <div class= 'form-group'>
		<label for= 'username'>Username</label>
                <input type="text" class="form-control" id="txt_uname" name="txt_uname" placeholder="Username" />
	</div>
	<div class= 'form-group'>
		<label for= 'password'>Password</label>
		<input type="password" class="form-control" id="txt_uname" name="txt_pwd" placeholder="Password"/>
		<small class= 'form-text text-danger' id= 'loginError'></small>
	</div>
		<button type="submit" class= 'btn btn-outline-light' name="but_login" id="but_login">Submit</button>
      </form>
    </div>
  </div>
</div>
<script>
  function showError(error, id){
  document.getElementById(id).innerHTML = error;
  }
</script>
</body>
</html>
<?php
// Connect to the database and check if the username and password are correct
include "config.php";

if(isset($_POST['but_login'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
	    session_start();
            $_SESSION['uname'] = $uname;
	    echo "<script> window.location= '/home'; </script>";
        }else{
            echo "<script> showError('Invalid username or password', 'loginError'); </script> ";
        }

    }

}

// Register new users onto the database.

  $uname_signup= mysqli_real_escape_string($con,$_REQUEST['signup_txt_uname']);
  $password_signup= mysqli_real_escape_string($con,$_REQUEST['signup_txt_pwd']);

  // Handling errors
  $MYSQL_CODE_DUPLICATE_KEY = 1062;

  if ($uname_signup !="" && $password_signup != ""){

  // Create the user in the database.
  $sql = "INSERT INTO users (username, password) VALUES ('$uname_signup', '$password_signup')";

  // If successfully created, .
  if (mysqli_query($con, $sql)){
    session_start();
    $_SESSION['uname'] = $uname_signup;
    echo "<script> window.location = '/home'; </script>";
  // Otherwise if the username already exists, throw a custom error.
  } elseif (mysqli_errno($con) == $MYSQL_CODE_DUPLICATE_KEY){
    echo "<script> showError('Username is already taken', 'signError'); $('#signupModal').modal('show')</script>";
  } else {
    echo "Error: " .sql . "<br>" . mysqli_error($con);
  }

  mysqli_close($con); 
  }
?>
