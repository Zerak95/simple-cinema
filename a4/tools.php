<?php
  session_start();

function preShow( $arr, $returnAsString=false ) {
  $ret  = '<pre>' . print_r($arr, true) . '</pre>';
  if ($returnAsString)
    return $ret;
  else
  echo $ret; 
}

function printMyCode() {
  $lines = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre class='mycode'><ol>";
  foreach ($lines as $line)
     echo '<li>'.rtrim(htmlentities($line)).'</li>';
  echo '</ol></pre>';
}


function session_set_post(){
  if(isset($_POST['movie'])){
    $movie = $_POST['movie'];

    // echo $movie;
    $_SESSION['movie'] = $movie;
  }

  if(isset($_POST['seats'])){
    $_SESSION['seats'] = $_POST['seats'];
  }
  
  if(isset($_POST['cust'])){
    $_SESSION['cust'] = $_POST['cust'];
  }
}

//   function session_set_post() {

//     $_SESSION['movie'] = $_POST['movie'];
//     $_SESSION['seats'] = $_POST['seats'];
//     $_SESSION['cust'] = $_POST['cust'];

// }

//TODO: might want to move this up if it can be before the function 


// Put your PHP functions and modules here

?>