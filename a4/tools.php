<?php
  session_start();
  

  function session_set_post() {

    $_SESSION['movie'] = $_POST['movie'];
    $_SESSION['seats'] = $_POST['seats'];
    $_SESSION['cust'] = $_POST['cust'];

}

//TODO: might want to move this up if it can be before the function 
session_set_post();

// Put your PHP functions and modules here

?>