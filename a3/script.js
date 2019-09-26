



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

    console.log(window.scrollY);
    clearActiveNav()


    
    // makes sure that areas abouve or bellow the sections do not highlight the navbar
    while (n < sections.length - 1 && sections[n + 1].offsetTop <= window.scrollY &&
        (sections[sections.length - 1].offsetTop + sections[sections.length - 1].scrollHeight) > window.scrollY) {
        
        
            
        console.log("n  before incroment is: " + n);
        n++;
        console.log("n is: " + n);

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
