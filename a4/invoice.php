<?php
session_start();

// if(!isset($_SESSION['cart'])){

//     // header("Location: index.php");

//   }









$current_date = date("Y-m");
echo "current_date is: " . $current_date ."<br>";
// $date_to_compare = date("Y-m",time()+86400); //1 day later
// if (strtotime($date_to_compare) > strtotime($current_date)) {
//    echo "too late";
// }

// echo "<br><br><br>";

// $current_date = $current_date + 1;
// echo "current_date +1 is: " . $current_date ."<br>";

// echo "<br><br><br>";

// $current_date = $current_date + 3;
// echo "current_date +3 is: " . $current_date ."<br>";

echo "<br><br><br>";

$current_year = date("Y");
echo "current_year is: " . $current_year ."<br>";

echo "<br><br><br>";

$current_month = date("m");
echo "current_month is: " . $current_month ."<br>";


echo "<br><br><br>";
$yearMonth = "$current_year" . "-" . "$current_month";

echo "current_month + current_year is: " . $yearMonth ."<br>";

echo "<br><br><br>";
if($current_month == 10){
    echo "current_month is indeed 10<br>";
}

echo "<br><br><br>";
$current_month = "0" . $current_month -1;

echo "current_month - 1 is: " . $current_month ."<br>";
echo "current_month - 1 is: 0" . $current_month ."<br>";



// echo "<br><br><br>";
// $current_month = $current_month +3;

// echo "current_month + 3 is: " . $current_month ."<br>";



echo "<br><br><br>";
$date_to_compare = "$yearMonth" . "-" . "$current_month";
echo "date_to_compare  ";
echo $date_to_compare;
echo "<br>current_date";
echo $current_date;
if (strtotime($date_to_compare) < strtotime($current_date)) {
    echo "too not a valid date";
}
echo "<br><br><br>";
echo 'Next month: '. date('Y-m-d', strtotime('+1 month')) ."\n";

echo "<br><br><br>";
echo 'last month: '. date('Y-m-d', strtotime('-1 month')) ."\n";

echo "<br><br><br>";
echo 'in 5 months: '. date('Y-m-d', strtotime('-5 month')) ."\n";



echo "<br><br><br>";
echo "Y-m only";
echo "<br><br><br>";

echo 'Next month: '. date('Y-m', strtotime('+1 month')) ."\n";

echo "<br><br><br>";
echo 'last month: '. date('Y-m', strtotime('-1 month')) ."\n";

echo "<br><br><br>";
echo 'in 5 months: '. date('Y-m', strtotime('-5 month')) ."\n";

echo "<br><br><br>";

echo "check if date is bigger than other date<br>";

$current_date = date("Y-m");
$date_to_compare = date('Y-m', strtotime('-1 month'));

echo "date_to_compare";
echo $date_to_compare;
echo "<br>current_date";
echo $current_date;

if (strtotime($date_to_compare) < strtotime($current_date)) {
    echo "<br>date_to_compare is samller<br>";
}

if (strtotime($date_to_compare) > strtotime($current_date)) {
    echo "date_to_compare is bigger<br>";
}

echo "<br><br><br>";
echo "testing if a normal value works";
echo "<br>";
$date_to_compare = "2019-12";

echo "date_to_compare   ";
echo $date_to_compare;
echo "<br>current_date   ";
echo $current_date;

echo "<br>";


if (strtotime($date_to_compare) > strtotime($current_date)) {
    echo "date_to_compare is bigger<br>";
}

if (strtotime($date_to_compare) < strtotime($current_date)) {
    echo "<br>date_to_compare is samller<br>";
}







echo "<br><br><br>";





// echo "<br><br><br>";
// if($current_month )







// $current_month = date("Y");
// echo "current_month is: " . $current_month ."<br>";






// echo this is test 1

// echo this is test 2;

// if(isset($_POST['movie'])){
//     $movie = $_POST['movie'];
    
//     echo $movie;
//     // $_SESSION['movie'] = $_POST['movie'];
//   }

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

