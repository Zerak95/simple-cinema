<?php
// echo this is test 1

// echo this is test 2;

print_r($_POST);

$seats = $_POST['seats']['FCC'];
// $seatsSTA = $_POST['seats']['STA'];

// echo "this is test 3\n";
echo "<br><br><br>";

echo "\n\nPOST\n\n";

echo "\n\nseats\n\n";
echo $seats;

echo "<br><br><br>";
echo "SESSION\n";

print_r($_SESSION);



// echo "SESSION\n";


// echo $_SESSION;

// echo "\n\nPOST\n";

// echo $_POST;

// echo "\n\nPOST cust\n";

// echo $_POST["cust"];







?>

