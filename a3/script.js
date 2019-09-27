



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
for(var i = 0; i < timeButtons.length; i++){
    timeButtons[i].addEventListener('click', function () {
        timeButtonsInfo(this);
    });
}


// set tempMovieDayTime to the button.innerHTML
function timeButtonsInfo(button){
    tempMovieDayTime = button.innerHTML;
    console.log(button.innerHTML);
    setDayOfMovie();
    setTimeOfMovie(tempMovieDayTime);
}

//if the day is part of tempMovieDayTime return true
function movieDay(day){
    console.log("day is: " + day);
    var n = tempMovieDayTime.includes(day);
    return n;
}

//set the movie day fo synopsis area and id="movie-day""
function setDayOfMovie(){
    for(var i=0; i<arrayOfDay.length; i++){
        console.log('loop started');
        console.log("arrayOfDay[i]: " + arrayOfDay[i]);
        console.log("movieDay(arrayOfDay[i]): " + movieDay(arrayOfDay[i]));
        

        if(movieDay(arrayOfDay[i])){
            synopsisAreaMovieDay = arrayOfDay[i];
            document.getElementById("movieDay").innerHTML = synopsisAreaMovieDay;
            document.getElementById("movie-day").value = arrayOfDayShort[i]; 
            break;           

        }
    }
}



function retnum(str) { 
    var num = str.replace(/[^0-9]/g, ''); 
    return parseInt(num,10); 
}

function setTimeOfMovie(str){
    document.getElementById("movieTime").innerHTML = retnum(str);
    var militaryTime = Number(retnum(str));
    if(militaryTime < 12){
        militaryTime += 12 ;
    }
    var movieHour = "T" + militaryTime;
    document.getElementById("movie-hour").value = movieHour; 
}







// topEndWeddinPoster.addEventListener('click',showSynopsis('synopsisRMC'));
