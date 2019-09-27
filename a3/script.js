window.onscroll = function () {
    var sections = this.document.querySelectorAll("section");
    var navLinks = this.document.getElementsByClassName("navLink");
    var n = -1;

    function clearActiveNav() {
        for (var i = 0; i < navLinks.length; i++) {
            navLinks[i].classList.remove("active");
        }
    }

    // var sections = this.document.querySelectorAll("section");

    // console.log(window.scrollY);
    clearActiveNav()



    // makes sure that areas abouve or bellow the sections do not highlight the navbar
    while (n < sections.length - 1 && sections[n + 1].offsetTop <= window.scrollY &&
        (sections[sections.length - 1].offsetTop + sections[sections.length - 1].scrollHeight) > window.scrollY) {



        // console.log("n  before incroment is: " + n);
        n++;
        // console.log("n is: " + n);

        if (n >= 0) {
            clearActiveNav()
            navLinks[n].classList.add("active");
            //  console.log(sections[n+1].id + "(offsetTop): " + sections[n+1].offsetTop);
            //  console.log("window.scrollY is: " + window.scrollY);
        }

        // if(n >= sections.length-1){
        //     n=-1;
        // }

    }
}

function showSynopsis(id) {
    hideAllSynopsis();
    var x = document.getElementById(id);
    x.style.display = "block";

    // put in a seperate function
    tempSynopsisID = id;
    tempMovieName = document.querySelector("#" + CSS.escape(tempSynopsisID) + " .movieName").textContent;
    document.getElementById("movieTitle").innerHTML = tempMovieName;
}

function hideSynopsis(id) {
    var x = document.getElementById(id);
    x.style.display = "none";
    // console.log("hiding: " + id);
}

function hideAllSynopsis() {
    movieSynopsisAreas.forEach(element => {
        hideSynopsis(element);
    });

    // hideSynopsis("synopsisACT");
    // hideSynopsis("synopsisRMC");
    // hideSynopsis("synopsisANM");
    // hideSynopsis("synopsisAHF");
}

var avengersPoster = document.getElementById("avengersPoster");
avengersPoster.addEventListener('click', event => { showSynopsis("synopsisACT") });

var topEndWeddingPoster = document.getElementById("topEndWeddingPoster");
topEndWeddingPoster.addEventListener('click', event => { showSynopsis("synopsisRMC") });

var dumboPoster = document.getElementById("dumboPoster");
dumboPoster.addEventListener('click', event => { showSynopsis("synopsisANM") });

var theHappyPrincePoster = document.getElementById("theHappyPrincePoster");
theHappyPrincePoster.addEventListener('click', event => { showSynopsis("synopsisAHF") });

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


// for(var i=0; i<timeButtons.length; i++){
//     timeButtons[i].addEventListener('click', event => {timeButtonsInfo(i)});    
// }

// timeButtons.forEach(element => {
//     addEventListener('click', event => {timeButtonsInfo(element)});
// });


// timeButtons.addEventListener('click', function(event) {
//     // find the closest parent of the event target that
//     // matches the selector
//     var closest = event.target.closest(selector);
//     if (closest && base.contains(closest)) {
//       // handle class event
//     }
//   });


//addEventListener to evey item in the array
for (var i = 0; i < timeButtons.length; i++) {
    timeButtons[i].addEventListener('click', function () {
        timeButtonsInfo(this);
    });
}


// set tempMovieDayTime to the button.innerHTML when pressed
function timeButtonsInfo(button) {
    tempMovieDayTime = button.innerHTML;
    console.log(button.innerHTML);
    setDayOfMovie();
    setTimeOfMovie(tempMovieDayTime);
    discountApply();
}

//if the day is part of tempMovieDayTime return true
function movieDay(day) {
    console.log("day is: " + day);
    var n = tempMovieDayTime.includes(day);
    return n;
}

//set the movie day fo synopsis area and id="movie-day""
function setDayOfMovie() {
    for (var i = 0; i < arrayOfDay.length; i++) {
        console.log('loop started');
        console.log("arrayOfDay[i]: " + arrayOfDay[i]);
        console.log("movieDay(arrayOfDay[i]): " + movieDay(arrayOfDay[i]));


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

//TODO: make this a boolean
//TODO: make a function that discounts the cost in its a weekday or other requirrements 
function discountApply() {
    //TODO: make sure this is the right expretion 
    console.log("******calling discountApply()");

    if (synopsisAreaMovieDay == arrayOfDay[0] || synopsisAreaMovieDay == arrayOfDay[2]) {
        isDiscount = true;
        console.log("*******first true");

    } else if (synopsisAreaMovieDay == arrayOfDay[1] || synopsisAreaMovieDay == arrayOfDay[3] || synopsisAreaMovieDay == arrayOfDay[4]) {
        if (retnum(tempMovieDayTime) == 12) {
            isDiscount = true;
            console.log("*******second true");
        } else {
            console.log("*******first false");
            isDiscount = false;
        }
    } else {
        isDiscount = false;
        console.log("*******second false");

    }


}

var STAtotal = 0;
var STPtotal = 0;
var STCtotal = 0;
var FCAtotal = 0;
var FCPtotal = 0;
var FCCtotal = 0;
var finalPrice = 0;

// TODO: make an object class with seat codes and each seat code has discoun price and full price in an array.
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


// document.getElementById("seats-STA").addEventListener('onblur', function () {
//     updateCost();
// });


document.getElementById("seats-STA").addEventListener('change', event => { updateCost() });
document.getElementById("seats-STP").addEventListener('change', event => { updateCost() });
document.getElementById("seats-STC").addEventListener('change', event => { updateCost() });
document.getElementById("seats-FCA").addEventListener('change', event => { updateCost() });
document.getElementById("seats-FCP").addEventListener('change', event => { updateCost() });
document.getElementById("seats-FCC").addEventListener('change', event => { updateCost() });



function updateCost() {
    console.log("update all calculations");

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
        console.log("the value is NaN");
        STAtotal = 0;
    } else {
        if (isDiscount) {
            STAtotal = parseInt(numberOfSeats) * seatCode.STAdiscount;
        } else {
            STAtotal = parseInt(numberOfSeats) * seatCode.STAnormal;
        }
    }

    console.log("STAtotal is: " + STAtotal);
}

function priceForSTP() {
    var numberOfSeats = retnum(document.getElementById("seats-STP").value);

    if (isNaN(numberOfSeats)){
        console.log("the value is NaN");
        STPtotal = 0;
    }else{
        if (isDiscount) {
            STPtotal = parseInt(numberOfSeats) * seatCode.STPdiscount;
        } else {
            STPtotal = parseInt(numberOfSeats) * seatCode.STPnormal;
        }
    }
    

    console.log("STPtotal is: " + STPtotal);
}

function priceForSTC() {
    var numberOfSeats = retnum(document.getElementById("seats-STC").value);

    if (isNaN(numberOfSeats)){
        console.log("the value is NaN");
        STCtotal = 0;
    }else{
        if (isDiscount) {
            STCtotal = parseInt(numberOfSeats) * seatCode.STCdiscount;
        } else {
            STCtotal = parseInt(numberOfSeats) * seatCode.STCnormal;
        }
    }

    console.log("STCtotal is: " + STCtotal);
}

function priceForFCA() {
    var numberOfSeats = retnum(document.getElementById("seats-FCA").value);

    if (isNaN(numberOfSeats)){
        console.log("the value is NaN");
        FCAtotal = 0;
    }else{
        if (isDiscount) {
            FCAtotal = parseInt(numberOfSeats) * seatCode.FCAdiscount;
        } else {
            FCAtotal = parseInt(numberOfSeats) * seatCode.FCAnormal;
        }
    }
    

    console.log("FCAtotal is: " + FCAtotal);
}

function priceForFCP() {
    var numberOfSeats = retnum(document.getElementById("seats-FCP").value);

    if (isNaN(numberOfSeats)){
        console.log("the value is NaN");
        FCPtotal = 0;
    }else{
        if (isDiscount) {
            FCPtotal = parseInt(numberOfSeats) * seatCode.FCPdiscount;
        } else {
            FCPtotal = parseInt(numberOfSeats) * seatCode.FCPnormal;
        }
    }


    console.log("FCPtotal is: " + FCPtotal);
}

function priceForFCC() {
    var numberOfSeats = retnum(document.getElementById("seats-FCC").value);

    if (isNaN(numberOfSeats)){
        console.log("the value is NaN");
        FCCtotal = 0;
    }else{
        if (isDiscount) {
            FCCtotal = parseInt(numberOfSeats) * seatCode.FCCdiscount;
        } else {
            FCCtotal = parseInt(numberOfSeats) * seatCode.FCCnormal;
        }
    }
    
    

    console.log("FCCtotal is: " + FCCtotal);
}


// TODO: addEventListener to each input check if isDiscount == true give discounted price else norml price





// TODO: hide Booking Form and let it only show when showing time is pressed


// topEndWeddinPoster.addEventListener('click',showSynopsis('synopsisRMC'));
