



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

var movieSynopsisAreas = ["synopsisACT", "synopsisRMC", "synopsisANM", "synopsisAHF"];

var tempSynopsisID = " ";
var tempMovieName = " "

var timeButton = document.getElementsByClassName("movieTimeButton");

var arrayOfDayButtons = ["mondayButton", "tuesdayButton", "wednesdayButton", 
    "thursdayButton", "fridayButton", "saturdayButton", "sundayButton"];


for(var i=0; i<arrayOfDayButtons.length; i++){
    
}




// topEndWeddinPoster.addEventListener('click',showSynopsis('synopsisRMC'));
