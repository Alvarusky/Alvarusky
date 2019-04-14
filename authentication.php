<?php
  /* Check if user is authenticated */
session_start();
if ($_SESSION["uname"]){
    /* The user is logged in */
}else{
    /* The user is not logged in */
    header("location:/login.php");
    /* Now kill PHP to prevent further processing */
    die();
}
