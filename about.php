<?php

// Grab User submitted information
$email = $_POST["username"];
$pass = $_POST["passwd"];

// Connect to the database
$con = mysql_connect("localhost","root","vialactea");
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}

// Select the database to use
mysql_select_db("mysql",$con);

$result = mysql_query("SELECT username, passwd FROM usrdemi WHERE username = $email");

$row = mysql_fetch_array($result);

if($row["username"]==$email && $row["passwd"]==$pass)
    echo"You are a validated user.";
else
    echo"Sorry, your credentials are not valid, Please try again.";
?>
