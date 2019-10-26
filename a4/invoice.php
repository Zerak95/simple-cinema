<?php
include_once('tools.php');


if(!isset($_SESSION['cart'])){
    header("Location: index.php");
}


$movieArray = $_SESSION['cart']['movie'];
$seatsArray = $_SESSION['cart']['seats'];
$custArray = $_SESSION['cart']['cust'];

$isDiscount = false;


$STAtotal = 0;
$STPtotal = 0;
$STCtotal = 0;
$FCAtotal = 0;
$FCPtotal = 0;
$FCCtotal = 0;
$finalPrice = 0;



$seatCodePrice = [
    'STAdiscount' => '14.00',
    'STAnormal' => '19.80',

    'STPdiscount' => '12.50',
    'STPnormal' => '17.50',

    'STCdiscount' => '11.00',
    'STCnormal' => '15.30',

    'FCAdiscount' => '24.00',
    'FCAnormal' => '30.00',

    'FCPdiscount' => '22.50',
    'FCPnormal' => '27.00',

    'FCCdiscount' => '21.00',
    'FCCnormal' => '24.00'
];

//See if this time and day have a  discount
discountApply();



                         // 0      1      2      3      4      5      6
// var arrayOfDayShort = ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"];

function discountApply() {
    global $movieArray;
    global $isDiscount;

    echo"at the start of discountApply isDiscount: ";
    echo $isDiscount;
    echo "<br><br>";

    if ($movieArray['day'] == "MON" || $movieArray['day'] == "WED") {
        $isDiscount = true;

        echo"first loop of discountApply isDiscount: ";
        echo $isDiscount;
        echo "<br><br>";

    } else if ($movieArray['day'] == "TUE" || $movieArray['day'] == "THU" || $movieArray['day'] == "FRI") {
        if ($movieArray['hour'] == "T12") {
            $isDiscount = true;

            echo"second loop of discountApply isDiscount: ";
            echo $isDiscount;
            echo "<br><br>";
        } else {
            $isDiscount = false;
        }
    } else {
        $isDiscount = false;
    }

    echo"at the end of discountApply isDiscount: ";
    echo $isDiscount;
    echo "<br><br>";
}



function priceForSTA() {
    // $numberOfSeats = $seatsArray['STA'];
    global $seatsArray;
    global $isDiscount;
    global $seatCodePrice;
    global $STAtotal;

    if (empty($seatsArray['STA'])) {
        $STAtotal = 0;
    } else {
        if ($isDiscount) {
            $STAtotal = $seatsArray['STA'] * $seatCodePrice['STAdiscount'];
        } else {
            $STAtotal = $seatsArray['STA'] * $seatCodePrice['STAnormal'];
        }
    }

}

function priceForSTP() {
    // $numberOfSeats = $seatsArray['STP'];
    global $seatsArray;
    global $isDiscount;
    global $seatCodePrice;
    global $STPtotal;

    if (empty($seatsArray['STP'])) {
        $STPtotal = 0;
    } else {
        if ($isDiscount) {
            $STPtotal = $seatsArray['STP'] * $seatCodePrice['STPdiscount'];
        } else {
            $STPtotal = $seatsArray['STP'] * $seatCodePrice['STPnormal'];
        }
    }

}

function priceForSTC() {
    // $numberOfSeats = $seatsArray['STC'];
    global $seatsArray;
    global $isDiscount;
    global $seatCodePrice;
    global $STCtotal;

    if (empty($seatsArray['STC'])) {
        $STCtotal = 0;
    } else {
        if ($isDiscount) {
            $STCtotal = $seatsArray['STC'] * $seatCodePrice['STCdiscount'];
        } else {
            $STCtotal = $seatsArray['STC'] * $seatCodePrice['STCnormal'];
        }
    }

}

function priceForFCA() {
    // $numberOfSeats = $seatsArray['FCA'];
    global $seatsArray;
    global $isDiscount;
    global $seatCodePrice;
    global $FCAtotal;

    if (empty($seatsArray['FCA'])) {
        $FCAtotal = 0;
    } else {
        if ($isDiscount) {
            $FCAtotal = $seatsArray['FCA'] * $seatCodePrice['FCAdiscount'];
        } else {
            $FCAtotal = $seatsArray['FCA'] * $seatCodePrice['FCAnormal'];
        }
    }

}

function priceForFCP() {
    // $numberOfSeats = $seatsArray['FCP'];
    global $seatsArray;
    global $isDiscount;
    global $seatCodePrice;
    global $FCPtotal;

    if (empty($seatsArray['FCP'])) {
        $FCPtotal = 0;
    } else {
        if ($isDiscount) {
            $FCPtotal = $seatsArray['FCP'] * $seatCodePrice['FCPdiscount'];
        } else {
            $FCPtotal = $seatsArray['FCP'] * $seatCodePrice['FCPnormal'];
        }
    }

}

//TODO: delete this
echo"FCCtotal seatsArray['FCC'] is: ";
echo $seatsArray['FCC'];
echo "<br><br>";


function priceForFCC() {
    // $numberOfSeats = $seatsArray['FCC'];
    global $seatsArray;
    global $isDiscount;
    global $seatCodePrice;
    global $FCCtotal;

    if (empty($seatsArray['FCC'])) {
        echo"FCCtotal seatsArray['FCC'] is empty ";
        echo "<br><br>";
        $FCCtotal = 0;
    } else {
        if ($isDiscount) {
            echo"FCCtotal seatsArray['FCC'] is discount ";
            echo "<br><br>";
            $FCCtotal = $seatsArray['FCC'] * $seatCodePrice['FCCdiscount'];
        } else {
            echo"FCCtotal seatsArray['FCC'] is not discount ";
            echo "<br><br>";
            $FCCtotal = $seatsArray['FCC'] * $seatCodePrice['FCCnormal'];
        }
    }

    echo"FCCtotal after priceForFCC is: ";
    echo $FCCtotal;
    echo "<br><br>";

}


function finalCost() {
    global $STPtotal;
    global $STCtotal;
    global $STAtotal;
    global $FCAtotal;
    global $FCPtotal;
    global $FCCtotal;

    global $finalPrice;

    echo"FCCtotal is: ";
    echo $FCCtotal;
    echo "<br><br>";
    $finalPrice = $STAtotal + $STPtotal + $STCtotal + $FCAtotal + $FCPtotal + $FCCtotal;
    $finalPrice = number_format((float)$finalPrice, 2, '.', '');
    $finalPrice = '$' . $finalPrice;
}





//TODO: add a counter for the type of seat in the priceFor methods
function updateCost() {
    priceForSTA();
    priceForSTP();
    priceForSTC();
    priceForFCA();
    priceForFCP();
    priceForFCC();
    finalCost();
}
    //TODO: active this after testing
updateCost();


echo "<br><br><br>";
echo "<br><br><br>";


echo "<br><br><br>";
echo "th final price is: <br>";
echo $finalPrice;
echo "<br><br><br>";




echo "<br><br><br>";


echo "this is to see if there is anything in _SESSION <br>";
print_r($_SESSION);
echo "<br><br><br> preShow";
preShow($_SESSION);

echo "<br><br><br> preShow of the 3";
preShow($movieArray);
preShow($seatsArray);
preShow($custArray);

echo "<br><br><br> seatCodePrice <br>";
preShow($seatCodePrice);

echo "<br> seatCodePrice: <br>";
echo $seatCodePrice['FCPdiscount'];

$seatTest = $seatCodePrice['FCPdiscount'] *3;
$seatTest = number_format((float)$seatTest, 2, '.', '');

$seatTest = '$' . $seatTest;
echo "<br> seatCodePrice * 3: <br>";
echo $seatTest;


echo "<br><br><br>";



//this comes out blank
// print_r($_POST);







// $current_date = date("Y-m");
// echo "current_date is: " . $current_date ."<br>";
// // $date_to_compare = date("Y-m",time()+86400); //1 day later
// // if (strtotime($date_to_compare) > strtotime($current_date)) {
// //    echo "too late";
// // }

// // echo "<br><br><br>";

// // $current_date = $current_date + 1;
// // echo "current_date +1 is: " . $current_date ."<br>";

// // echo "<br><br><br>";

// // $current_date = $current_date + 3;
// // echo "current_date +3 is: " . $current_date ."<br>";

// echo "<br><br><br>";

// $current_year = date("Y");
// echo "current_year is: " . $current_year ."<br>";

// echo "<br><br><br>";

// $current_month = date("m");
// echo "current_month is: " . $current_month ."<br>";


// echo "<br><br><br>";
// $yearMonth = "$current_year" . "-" . "$current_month";

// echo "current_month + current_year is: " . $yearMonth ."<br>";

// echo "<br><br><br>";
// if($current_month == 10){
//     echo "current_month is indeed 10<br>";
// }

// echo "<br><br><br>";
// $current_month = "0" . $current_month -1;

// echo "current_month - 1 is: " . $current_month ."<br>";
// echo "current_month - 1 is: 0" . $current_month ."<br>";



// // echo "<br><br><br>";
// // $current_month = $current_month +3;

// // echo "current_month + 3 is: " . $current_month ."<br>";



// echo "<br><br><br>";
// $date_to_compare = "$yearMonth" . "-" . "$current_month";
// echo "date_to_compare  ";
// echo $date_to_compare;
// echo "<br>current_date";
// echo $current_date;
// if (strtotime($date_to_compare) < strtotime($current_date)) {
//     echo "too not a valid date";
// }
// echo "<br><br><br>";
// echo 'Next month: '. date('Y-m-d', strtotime('+1 month')) ."\n";

// echo "<br><br><br>";
// echo 'last month: '. date('Y-m-d', strtotime('-1 month')) ."\n";

// echo "<br><br><br>";
// echo 'in 5 months: '. date('Y-m-d', strtotime('-5 month')) ."\n";



// echo "<br><br><br>";
// echo "Y-m only";
// echo "<br><br><br>";

// echo 'Next month: '. date('Y-m', strtotime('+1 month')) ."\n";

// echo "<br><br><br>";
// echo 'last month: '. date('Y-m', strtotime('-1 month')) ."\n";

// echo "<br><br><br>";
// echo 'in 5 months: '. date('Y-m', strtotime('-5 month')) ."\n";

// echo "<br><br><br>";

// echo "check if date is bigger than other date<br>";

// $current_date = date("Y-m");
// $date_to_compare = date('Y-m', strtotime('-1 month'));

// echo "date_to_compare";
// echo $date_to_compare;
// echo "<br>current_date";
// echo $current_date;

// if (strtotime($date_to_compare) < strtotime($current_date)) {
//     echo "<br>date_to_compare is samller<br>";
// }

// if (strtotime($date_to_compare) > strtotime($current_date)) {
//     echo "date_to_compare is bigger<br>";
// }

// echo "<br><br><br>";
// echo "testing if a normal value works";
// echo "<br>";
// $date_to_compare = "2019-12";

// echo "date_to_compare   ";
// echo $date_to_compare;
// echo "<br>current_date   ";
// echo $current_date;

// echo "<br>";


// if (strtotime($date_to_compare) > strtotime($current_date)) {
//     echo "date_to_compare is bigger<br>";
// }

// if (strtotime($date_to_compare) < strtotime($current_date)) {
//     echo "<br>date_to_compare is samller<br>";
// }







// echo "<br><br><br>";
// $date_to_compare = date('Y-m', strtotime('+8 month'));
// echo "this is a final test<br>";
// echo $date_to_compare;







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



// echo "<br><br><br>";
// // $_SESSION['movie'] = $_POST['movie'];
// // print_r($_SESSION);
// echo "<br><br><br>";

// $movie = $_POST['movie'];
// print_r($movie);
// echo "<br><br><br>";
// echo $movie;


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

