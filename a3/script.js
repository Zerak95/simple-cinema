window.onscroll = function () {
    var sections = this.document.querySelectorAll("section");
    var navLinks = this.document.getElementsByClassName("navLink");
    var n = -1;

    function clearActiveNav() {
        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].classList.remove("active");
        }
    }

    clearActiveNav()

    // makes sure that areas abouve or bellow the sections do not highlight the navbar
    while (n < sections.length - 1 && sections[n + 1].offsetTop <= window.scrollY &&
        (sections[sections.length - 1].offsetTop + sections[sections.length - 1].scrollHeight) > window.scrollY) {

        n++;

        if (n >= 0) {
            clearActiveNav()
            navLinks[n].classList.add("active");
        }
    }
}

function showSynopsis(id) {
    hideAllSynopsis();
    hideBookingForm();
    setExpiryDate();

    var x = document.getElementById(id);
    x.style.display = "block";

    // put in a seperate function
    tempSynopsisID = id;
    tempMovieName = document.querySelector("#" + CSS.escape(tempSynopsisID) + " .movieName").textContent;
    document.getElementById("movieTitle").innerHTML = tempMovieName;
}

function setMovieID(movieID) {
    var movieCode = movieID.substr(movieID.length - 3);
    document.getElementById("movie-id").value = movieCode;
}


function hideSynopsis(id) {
    var x = document.getElementById(id);
    x.style.display = "none";
}

function hideBookingForm() {
    var x = document.getElementById("booking-form");
    x.style.display = "none";
}

function showBookingForm() {
    var x = document.getElementById("booking-form");
    x.style.display = "block";
}

//hide all the Synopsis panels
function hideAllSynopsis() {
    movieSynopsisAreas.forEach(element => {
        hideSynopsis(element);
    });

    // hideSynopsis("synopsisACT");
    // hideSynopsis("synopsisRMC");
    // hideSynopsis("synopsisANM");
    // hideSynopsis("synopsisAHF");
}

//shows Synopsis Area when one of the movie posters is clicked.
var avengersPoster = document.getElementById("avengersPoster");
avengersPoster.addEventListener('click', event => { showSynopsis("synopsisACT"); setMovieID("synopsisACT"); });

var topEndWeddingPoster = document.getElementById("topEndWeddingPoster");
topEndWeddingPoster.addEventListener('click', event => { showSynopsis("synopsisRMC"); setMovieID("synopsisRMC");});

var dumboPoster = document.getElementById("dumboPoster");
dumboPoster.addEventListener('click', event => { showSynopsis("synopsisANM"); setMovieID("synopsisANM"); });

var theHappyPrincePoster = document.getElementById("theHappyPrincePoster");
theHappyPrincePoster.addEventListener('click', event => { showSynopsis("synopsisAHF"); setMovieID("synopsisAHF"); });




//TODO: get the last 3 char and pass them into id="movie-id"
var movieSynopsisAreas = ["synopsisACT", "synopsisRMC", "synopsisANM", "synopsisAHF"];

var tempSynopsisID = " ";
var tempMovieName = " ";
var tempMovieDayTime = " "
// this one goes into movie[day]
var synopsisAreaMovieDay = " "

var isDiscount = null;

var timeButtons = document.getElementsByClassName("movieTimeButton");

var arrayOfDay = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
var arrayOfDayShort = ["MON", "TUE", "WED", "THU", "FRI", "SAT", "SUN"];



//addEventListener to evey item in the array
for (var i = 0; i < timeButtons.length; i++) {
    timeButtons[i].addEventListener('click', function () {
        timeButtonsInfo(this);
    });
}


// set tempMovieDayTime to the button.innerHTML when pressed
function timeButtonsInfo(button) {
    tempMovieDayTime = button.innerHTML;

    setDayOfMovie();
    setTimeOfMovie(tempMovieDayTime);
    discountApply();
    showBookingForm()

    //this is done to make sure that the customer cant change the day and during
    //      seat selection without having to reset everything 
    hideAllSynopsis();
}

//if the day is part of tempMovieDayTime return true
function movieDay(day) {
    var n = tempMovieDayTime.includes(day);
    return n;
}

//set the movie day fo synopsis area and id="movie-day""
function setDayOfMovie() {
    for (var i = 0; i < arrayOfDay.length; i++) {

        if (movieDay(arrayOfDay[i])) {
            synopsisAreaMovieDay = arrayOfDay[i];
            document.getElementById("movieDay").innerHTML = synopsisAreaMovieDay;
            document.getElementById("movie-day").value = arrayOfDayShort[i];
            break;

        }
    }
}


//return an int from the string and remove letters
function retnum(str) {
    var num = str.replace(/[^0-9]/g, '');
    return parseInt(num, 10);
}

function setTimeOfMovie(str) {
    document.getElementById("movieTime").innerHTML = retnum(str);
    var militaryTime = Number(retnum(str));
    if (militaryTime < 12) {
        militaryTime += 12;
    }
    var movieHour = "T" + militaryTime;
    document.getElementById("movie-hour").value = movieHour;
}

// returns true if the customer can get a discount on their selection
function discountApply() {
    if (synopsisAreaMovieDay == arrayOfDay[0] || synopsisAreaMovieDay == arrayOfDay[2]) {
        isDiscount = true;

    } else if (synopsisAreaMovieDay == arrayOfDay[1] || synopsisAreaMovieDay == arrayOfDay[3] || synopsisAreaMovieDay == arrayOfDay[4]) {
        if (retnum(tempMovieDayTime) == 12) {
            isDiscount = true;
        } else {
            isDiscount = false;
        }
    } else {
        isDiscount = false;
    }


}

var STAtotal = 0;
var STPtotal = 0;
var STCtotal = 0;
var FCAtotal = 0;
var FCPtotal = 0;
var FCCtotal = 0;
var finalPrice = 0;

var seatCode = {
    STAdiscount: 14.00,
    STAnormal: 19.80,

    STPdiscount: 12.50,
    STPnormal: 17.50,

    STCdiscount: 11.00,
    STCnormal: 15.30,

    FCAdiscount: 24.00,
    FCAnormal: 30.00,

    FCPdiscount: 22.50,
    FCPnormal: 27.00,

    FCCdiscount: 21.00,
    FCCnormal: 24.00
};


//listen to when a change hapens in the number of seats elected
document.getElementById("seats-STA").addEventListener('change', event => { updateCost() });
document.getElementById("seats-STP").addEventListener('change', event => { updateCost() });
document.getElementById("seats-STC").addEventListener('change', event => { updateCost() });
document.getElementById("seats-FCA").addEventListener('change', event => { updateCost() });
document.getElementById("seats-FCP").addEventListener('change', event => { updateCost() });
document.getElementById("seats-FCC").addEventListener('change', event => { updateCost() });



function updateCost() {
    priceForSTA();
    priceForSTP();
    priceForSTC();
    priceForFCA();
    priceForFCP();
    priceForFCC();
    finalCost();
}

function finalCost() {
    finalPrice = (STAtotal + STPtotal + STCtotal + FCAtotal + FCPtotal + FCCtotal).toFixed(2);

    document.getElementById("cust-payment").value = "$" + finalPrice;

}

// parseFloat((finalPrice).toFixed(2));

function priceForSTA() {
    var numberOfSeats = retnum(document.getElementById("seats-STA").value);

    if (isNaN(numberOfSeats)) {
        STAtotal = 0;
    } else {
        if (isDiscount) {
            STAtotal = parseInt(numberOfSeats) * seatCode.STAdiscount;
        } else {
            STAtotal = parseInt(numberOfSeats) * seatCode.STAnormal;
        }
    }

}

function priceForSTP() {
    var numberOfSeats = retnum(document.getElementById("seats-STP").value);

    if (isNaN(numberOfSeats)) {
        STPtotal = 0;
    } else {
        if (isDiscount) {
            STPtotal = parseInt(numberOfSeats) * seatCode.STPdiscount;
        } else {
            STPtotal = parseInt(numberOfSeats) * seatCode.STPnormal;
        }
    }


}

function priceForSTC() {
    var numberOfSeats = retnum(document.getElementById("seats-STC").value);

    if (isNaN(numberOfSeats)) {
        STCtotal = 0;
    } else {
        if (isDiscount) {
            STCtotal = parseInt(numberOfSeats) * seatCode.STCdiscount;
        } else {
            STCtotal = parseInt(numberOfSeats) * seatCode.STCnormal;
        }
    }

}

function priceForFCA() {
    var numberOfSeats = retnum(document.getElementById("seats-FCA").value);

    if (isNaN(numberOfSeats)) {
        FCAtotal = 0;
    } else {
        if (isDiscount) {
            FCAtotal = parseInt(numberOfSeats) * seatCode.FCAdiscount;
        } else {
            FCAtotal = parseInt(numberOfSeats) * seatCode.FCAnormal;
        }
    }


}

function priceForFCP() {
    var numberOfSeats = retnum(document.getElementById("seats-FCP").value);

    if (isNaN(numberOfSeats)) {
        FCPtotal = 0;
    } else {
        if (isDiscount) {
            FCPtotal = parseInt(numberOfSeats) * seatCode.FCPdiscount;
        } else {
            FCPtotal = parseInt(numberOfSeats) * seatCode.FCPnormal;
        }
    }


}

function priceForFCC() {
    var numberOfSeats = retnum(document.getElementById("seats-FCC").value);

    if (isNaN(numberOfSeats)) {
        FCCtotal = 0;
    } else {
        if (isDiscount) {
            FCCtotal = parseInt(numberOfSeats) * seatCode.FCCdiscount;
        } else {
            FCCtotal = parseInt(numberOfSeats) * seatCode.FCCnormal;
        }
    }
}


document.getElementById("cust-mobile").addEventListener('blur', event => { isAustralianNumber() });
document.getElementById("cust-name").addEventListener('blur', event => { isWesternName() });

function isAustralianNumber() {
    var mobileNumber = document.getElementById("cust-mobile");
    var expression = /^(\(04\)|04|\+614)( ?\d){8}$/;


    if (expression.test(mobileNumber.value)){
        return true;
    }else{
        document.getElementById('mobileError').innerHTML = "<br>Sorry, you must use a western name";
        return false;
    }
}

function isWesternName() {
    var custName = document.getElementById("cust-name");
    var expression = /^[a-zA-Z \-.']{1,100}$/;


    if (expression.test(custName.value)) {
        return true;
    } else {
        document.getElementById('nameError').innerHTML = "<br>Sorry, you must use a western name";
        return false;
    }
}

function isValidCreditCard() {
    var custCard = document.getElementById("credit-card");
    var expression = /^(?:4\d{3}|5[1-5]\d{2}|6011|3[47]\d{2})([-\s]?)\d{4}\1\d{4}\1\d{3,4}$/;
  
    if (expression.test(custCard.value)) {
        return true;
    } else {
        document.getElementById('creditCardError').innerHTML = "<br>Sorry, you must use a valid Credit Card";
        return false;
    }
}

function setExpiryDate() {
    var date = new Date;
    var currentMonth = date.getMonth();
    var currentYear = date.getFullYear();

    //the month value is 1 less than curent month since 0 is counted for Jan
    currentMonth++

    var nextMonth = parseInt(currentMonth) + 1;
    var nextYear = currentYear;

    if (currentMonth >= 12) {
        nextMonth = 1;
        nextYear = parseInt(currentYear) + 1;
    }

    if (nextMonth < 10) {
        nextMonth = "0" + nextMonth;
    }

    var minDate = "" + nextYear + "-" + nextMonth;

    document.getElementById('cust-expiry').setAttribute("min", minDate);
    
}


function formValidate() {
    clearErrors();
    var countErrors = 0;

    if (!isWesternName()) countErrors++;
    if (!isAustralianNumber()) countErrors++;
    if (!isValidCreditCard()) countErrors++;

    // Block or allow submission depending on number of errors
    // console.log(countErrors);
    return (countErrors == 0);
}

function clearErrors() {
    var allErrors = document.getElementsByClassName('error');
    for (var i = 0; i < allErrors.length; i++) {
        allErrors[i].innerHTML = "";
    }
}