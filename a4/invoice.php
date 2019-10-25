<?php

if(!isset($_SESSION['cart'])){

    // header("Location: index.php");

  }
// echo this is test 1

// echo this is test 2;

// if(isset($_POST['movie'])){
//     $movie = $_POST['movie'];
    
//     echo $movie;
//     // $_SESSION['movie'] = $_POST['movie'];
//   }
session_start();
echo "this is to see if there is anything in _SESSION <br>";
print_r($_SESSION);


// echo "<br><br><br>";
// // $_SESSION['movie'] = $_POST['movie'];
// // print_r($_SESSION);
// echo "<br><br><br>";

// $movie = $_POST['movie'];
// print_r($movie);
// echo "<br><br><br>";
// echo $movie;
echo "<br><br><br>";


print_r($_POST);

// $seats = $_POST['seats']['FCC'];
// // $seatsSTA = $_POST['seats']['STA'];

// // echo "this is test 3\n";
// echo "<br><br><br>";

// echo "\n\nPOST\n\n";

// echo "\n\nseats\n\n";
// echo $seats;

// echo "<br><br><br>";
// echo "SESSION\n";

// print_r($_SESSION);



// echo "SESSION\n";


// echo $_SESSION;

// echo "\n\nPOST\n";

// echo $_POST;

// echo "\n\nPOST cust\n";

// echo $_POST["cust"];


unset($_SESSION);
session_destroy();




?>

