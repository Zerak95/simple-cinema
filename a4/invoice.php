<?php
include_once('tools.php');


if(!isset($_SESSION['cart'])){
    header("Location: index.php");
}







$movieArray = $_SESSION['cart']['movie'];
$seatsArray = $_SESSION['cart']['seats'];
$custArray = $_SESSION['cart']['cust'];

$current_date = date("Y-m-d");


    
$isDiscount = false;


$STAtotal = 0;
$STPtotal = 0;
$STCtotal = 0;
$FCAtotal = 0;
$FCPtotal = 0;
$FCCtotal = 0;
$finalPrice = 0;

$standardSeatsPrice = 0;
$firstClassSeatsPrice = 0;
$GST = 0;

$standardSeatsNumber = 0;
$firstClassSeatsNumber = 0;
$seatsNumberFC = 1;
$seatsNumberST = 1;

$movieCode = $movieArray['id'];
$movieDay = $movieArray['day'];
$movieTime = $movieArray['hour'];



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

    //TODO: active this after testing
updateCost();

$booking = array('date' => $current_date, 'Name' => $custArray['name'], 'Email' =>  $custArray['email'],
    'Mobile' =>  $custArray['mobile'], 'MovieID' => $movieArray['id'], 'Day' => $movieArray['day'],
    'Hour' => $movieArray['hour'], 'STA' => $seatsArray['STA'], 'STP' => $seatsArray['STP'],
    'STC' => $seatsArray['STC'], 'FCA' => $seatsArray['FCA'], 'FCP' => $seatsArray['FCP'],
    'FCC' => $seatsArray['FCC'], 'Total' => $finalPrice
);

// preShow($booking);

$filename = "bookings.txt";
$fp = fopen($filename,"a");
flock($fp, LOCK_EX);

fputcsv($fp, $booking, "\t");

flock($fp, LOCK_UN);
fclose($fp);



                         // 0      1      2      3      4      5      6
// var arrayOfDayShort = ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"];

function discountApply() {
    global $movieArray;
    global $isDiscount;


    if ($movieArray['day'] == "MON" || $movieArray['day'] == "WED") {
        $isDiscount = true;


    } else if ($movieArray['day'] == "TUE" || $movieArray['day'] == "THU" || $movieArray['day'] == "FRI") {
        if ($movieArray['hour'] == "T12") {
            $isDiscount = true;

        } else {
            $isDiscount = false;
        }
    } else {
        $isDiscount = false;
    }

}



function priceForSTA() {
    // $numberOfSeats = $seatsArray['STA'];
    global $seatsArray;
    global $isDiscount;
    global $seatCodePrice;
    global $STAtotal;
    global $standardSeatsNumber;

    if (empty($seatsArray['STA'])) {
        $STAtotal = 0;
    } else {
        $standardSeatsNumber = $standardSeatsNumber + $seatsArray['STA'];

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
    global $standardSeatsNumber;

    if (empty($seatsArray['STP'])) {
        $STPtotal = 0;
    } else {
        $standardSeatsNumber = $standardSeatsNumber + $seatsArray['STP'];

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
    global $standardSeatsNumber;

    if (empty($seatsArray['STC'])) {
        $STCtotal = 0;        
    } else {
        $standardSeatsNumber = $standardSeatsNumber + $seatsArray['STC'];
  
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
    global $firstClassSeatsNumber;

    if (empty($seatsArray['FCA'])) {
        $FCAtotal = 0;
    } else {
        $firstClassSeatsNumber = $firstClassSeatsNumber + $seatsArray['FCA'];

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
    global $firstClassSeatsNumber;

    if (empty($seatsArray['FCP'])) {
        $FCPtotal = 0;
    } else {
        $firstClassSeatsNumber = $firstClassSeatsNumber + $seatsArray['FCP'];

        if ($isDiscount) {
            $FCPtotal = $seatsArray['FCP'] * $seatCodePrice['FCPdiscount'];
        } else {
            $FCPtotal = $seatsArray['FCP'] * $seatCodePrice['FCPnormal'];
        }
    }

}


function priceForFCC() {
    // $numberOfSeats = $seatsArray['FCC'];
    global $seatsArray;
    global $isDiscount;
    global $seatCodePrice;
    global $FCCtotal;
    global $firstClassSeatsNumber;

    if (empty($seatsArray['FCC'])) {
        $FCCtotal = 0;
    } else {
        $firstClassSeatsNumber = $firstClassSeatsNumber + $seatsArray['FCC'];

        if ($isDiscount) {
            $FCCtotal = $seatsArray['FCC'] * $seatCodePrice['FCCdiscount'];
        } else {
            $FCCtotal = $seatsArray['FCC'] * $seatCodePrice['FCCnormal'];
        }
    }
}


function finalCost() {
    global $STPtotal;
    global $STCtotal;
    global $STAtotal;
    global $FCAtotal;
    global $FCPtotal;
    global $FCCtotal;

    global $finalPrice;
    global $GST;
    global $standardSeatsPrice;
    global $firstClassSeatsPrice;


    $finalPrice = $STAtotal + $STPtotal + $STCtotal + $FCAtotal + $FCPtotal + $FCCtotal;
    $GST = $finalPrice / 11;
    $standardSeatsPrice = $STAtotal + $STPtotal + $STCtotal;
    $firstClassSeatsPrice = $FCAtotal + $FCPtotal + $FCCtotal;

    $finalPrice = number_format((float)$finalPrice, 2, '.', '');
    $finalPrice = '$' . $finalPrice;

    $GST = number_format((float)$GST, 2, '.', '');
    $GST = '$' . $GST;

    $standardSeatsPrice = number_format((float)$standardSeatsPrice, 2, '.', '');
    $standardSeatsPrice = '$' . $standardSeatsPrice;

    $firstClassSeatsPrice = number_format((float)$firstClassSeatsPrice, 2, '.', '');
    $firstClassSeatsPrice = '$' . $firstClassSeatsPrice;


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



// echo "<br><br><br>";
// echo "<br><br><br>";


// echo "<br><br><br>";
// echo "th final price is: <br>";
// echo $finalPrice;
// echo "<br><br><br>";





// preShow($_SESSION);

// echo "<br><br><br> preShow of the 3";
// preShow($movieArray);
// preShow($seatsArray);
// preShow($custArray);

// echo "<br><br><br> seatCodePrice <br>";
// preShow($seatCodePrice);

// echo "<br> seatCodePrice: <br>";
// echo $seatCodePrice['FCPdiscount'];

$seatTest = $seatCodePrice['FCPdiscount'] *3;
$seatTest = number_format((float)$seatTest, 2, '.', '');

// $seatTest = '$' . $seatTest;
// echo "<br> seatCodePrice * 3: <br>";
// echo $seatTest;


// echo "<br><br><br>";







// "First Class Ticket"

function printTickets($string){
    global $seatsNumberFC;
    global $seatsNumberST;
    global $movieCode;
    global $movieDay;
    global $movieTime;

    $seatsNumberG = 0;

    if ($string == "First Class Ticket") {
        $seatsNumberG = $seatsNumberFC;
    }

    if ($string == "Standar Ticket") {
        $seatsNumberG = $seatsNumberST;
    }
    

    
    echo "<br><br>";
    echo "<div class='invoice-box'>
        <table cellpadding='0' cellspacing='0'>
            <tr class='top'>
                <td colspan='2'>
                    <table>
                        <tr>
                            <td class='title'>
                                <img id='logoImageTicket' src='../../media/cinema-logo.jpg' alt='Cinema Logo'>
                            </td>
                            
                            <td>
                                $string<br>
                                
                                $seatsNumberG<br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
   
 
            <tr class='heading'>
                <td>
                    Movie Code
                </td>
                
                <td>
                $movieCode
                </td>
            </tr>
            
            <tr class='item'>
                <td>
                    Movie Day
                </td>
                
                <td>
                    $movieDay
                </td>
            </tr>
            
            <tr class='heading'>
                <td>
                    Movie Time
                </td>
                
                <td>
                    $movieTime
                </td>
            </tr>
            
        </table>
    </div>";

    
}

function printAllTickets(){
    global $firstClassSeatsNumber;
    global $standardSeatsNumber;
    global $seatsNumberFC;
    global $seatsNumberST;
    echo "<br><br><br><br><br><br><br>";


    for ($x = 0; $x < $firstClassSeatsNumber; $x++) {
        printTickets("First Class Ticket");
        $seatsNumberFC = $seatsNumberFC + 1;
    }

    echo "<br><br><br>";

    for ($x = 0; $x < $standardSeatsNumber; $x++) {
        printTickets("Standar Ticket");
        $seatsNumberST = $seatsNumberST + 1;
    }
}

//this comes out blank
// print_r($_POST);







// unset($_SESSION);
// session_destroy();






?>



<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2</title>

    <!-- TODO: make usre you fix the font family -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link id='stylecss' type="text/css" rel="stylesheet" href="invoice_style.css">
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img id="logoImage" src="../../media/cinema-logo.jpg" alt="Cinema Logo">
                            </td>
                            
                            <td>
                                Invoice #: 123<br>
                                
                                Created: <?= $current_date ?><br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Lunardo Cinema<br>
                                123 Flinders Street<br>
                                Melburne, vic 3000
                            </td>
                            
                            <td>
                                phone: 0412345678<br>
                                Email: Lunardo@Cinema.net Address
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
            
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Standard Seats
                </td>
                
                <td>
                    <?= $standardSeatsPrice ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    First Class Seats
                </td>
                
                <td>
                    <?= $firstClassSeatsPrice ?>
                </td>
            </tr>
            
            
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: <?= $finalPrice ?>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   GST: <?= $GST ?>
                </td>
            </tr>
        </table>
    </div>

    <?= 
        
        printAllTickets();

    ?>
</body>
</html>


<?= 
        
    preShow($_SESSION);

    unset($_SESSION);
    session_destroy();
?>


