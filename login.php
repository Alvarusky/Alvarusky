<?php

include "localhost/config.php";
session_start();
// Check user login or not
if(isset($_SESSION['uname'])){
    header('Location: /home');
}
?>
<html>
<style>

header {
  background-color:  #36393e;
  margin: 0 auto;
  padding: 0 auto;
}

body, html {
  margin: 0;
  padding: 0;
  background-color:  #36393e;
}

#navbar {
  width: 100%;
  overflow: hidden;
  background-color: #2b2d31; //#4a4c51;
//Código para ponerle sombra a la navigation bar.
  -webkit-box-shadow: 0 8px 6px -6px #999;
  -moz-box-shadow: 0 8px 6px -6px #999;
   box-shadow: 0 8px 6px -6px #999;
}

#navbar a {
  float: left;
  margin 0;
  display: block;
  color: white;
  text-align: center;
  padding: 20px;
  font-size: 150%;
  font-family: 'Indie Flower';
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
#navbar a:hover {
  background-color: #4a4c51;
}

#navbar .active {
  background-color:  #6666ff;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}

h1 {
 margin: 15px;
 padding-left:5%;
 text-align: center;
 font-family: 'Indie Flower';
 font-size: 700%;
 color: #ffffff; // #a0a4ac;
}

img {
  position: absolute;
  float:left;
  width: 180px;
  top: 0px;
  height: 180px;
  padding-left: 100px;
}

#login {
  text-align: center;
  font-family: 'Raleway';
}

#txt_uname {
  color: white;
  height: 25%;
  width: 20%;
  border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 2px solid white;
}

#but_submit {
  height: 20%;
  width: 20%;
  background: transparent;
  color: white;
}
</style>
<title>DemiChanclas</title>
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Laila:600" rel="stylesheet">
<link rel = 'stylesheet' href = '/home/home.css'></style>
<header>
<a href="index.php" style = "text-decoration: none">
  <img src = '/images/logo.png'>
  <h1>Chancletas Chillonas</h1>
</a>
<div id= 'navbar'>
<a class = 'active' href = 'index.php'>Home</a>
<a href = '#'>Datalogger</a>
<a href = '#'>MirabalPass</a>
<a href = '#'>BugNotes</a>
<a style = 'float:right' href = '/about'>About</a>
</div>

</header>
<div class="container">
    <form method="post" action="">
        <div>
            <h1 style = 'text-align: center; font-family: "Laila"; font-size: 650%; width: 87%'>Login</h1>
            <div id = 'login'>
                <br>
                <br>
                <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                <br>
                <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
                <br>
                <br>
                <br>
                <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                <br>
            </div>
        </div>
    </form>
</div>
</body>
</html>
<?php
include "config.php";

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from login where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
	   echo "ii";
	    session_start();
            $_SESSION['uname'] = $uname;
	    header('Location: /home');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
