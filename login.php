<html>
<form class="form-signin" method="POST">

        <h2 class="form-signin-heading">Please Login</h2>
        <div class="input-group">

           <span class="input-group-addon" id="basic-addon1">@</span>
	         <input type="text" name="username" class="form-control" placeholder="Username" required>

       </div>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>
</html>
<?php

session_start();
 require('logconfig.php');
//3. If the form is submitted or not.

if (isset($_POST['username']) and isset($_POST['password'])){

//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];

//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `UserName` WHERE userName='$username' and pass='$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){

$_SESSION['username'] = $username;
}

else {
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}

if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "Hai " . $username . "
";
echo "This is the Members Area
";

}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
?>
