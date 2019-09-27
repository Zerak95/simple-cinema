<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
    <script src='../wireframe.js'></script>
</head>

<body>
    <header>
        <div id="innerHeader">
            <div id="logoContainer">
                <img id="logoImage" src="../../media/cinema-logo.jpg" alt="Cinema Logo" />
                <h1>My Cinema <span>Website</span></h1>
            </div>
        </div>
    </header>
    <nav>
        <ul id="navigation">
            <a class="navLink" href="#about">
                <li>About US</li>
            </a>
            <a class="navLink" href="#prices">
                <li>Prices</li>
            </a>
            <a class="navLink" href="#showing">
                <li>Now Showing</li>
            </a>
        </ul>
    </nav>

    <section id="about">
        <div class="parallaxScrolling"></div>
        <div class="infoDiv">
            <p>With our grand reopening, we have improved our theatres by incorporating the new 3D Dolby Vision
                projection and
                Dolby Atmos sound systems:</p>
            <img src="../../media/mtk-image.jpg" alt="Dolby Atmos sound systems" class="mktImage" />
        </div>
        <div class="parallaxScrolling"></div>
        <div class="infoDiv">
            <p> We also improved our seating arraignments for both the Standard and First Class seats:</p>
            <p>Standard Seats</p>
            <img src="../../media/normal-chairs.jpg" alt="Standard Seats" class="mktImage" />

        </div>
        <div class="parallaxScrolling"></div>
        <div class="infoDiv">
            <p>First Class Seats</p>
            <img src="../../media/Verona-Twin.png" alt="First Class Seats 1" class="mktImage" />
            <img src="../../media/firstclass-person.png" alt="First Class Seats 2" class="mktImage" />
        </div>
        <div class="parallaxScrolling"></div>
    </section>


    <section id="prices">
        <h1>Prices</h1>
        <div class="infoDiv">

            <h2 class="priceMain">Standard Adult STA</h2>
            <p class="priceSubtitle">Monday, Wednesday (ALL DAY) + 12PM other Weekdays</p>
            <p class="priceNumber">AUD 14.00</p>
            <p class="priceSubtitle">All Other Times</p>
            <p class="priceNumber">AUD 19.80</p>
            <p class="textMuted"></p>
        </div>
        <div class="infoDiv">
            <h2 class="priceMain">Standard Concession STP</h2>
            <p class="priceSubtitle">Monday, Wednesday (ALL DAY) + 12PM other Weekdays</p>
            <p class="priceNumber">AUD 12.50</p>
            <p class="priceSubtitle">All Other Times</p>
            <p class="priceNumber">AUD 17.50</p>
            <p class="textMuted"></p>
        </div>
        <div class="infoDiv">
            <h2 class="priceMain">Standard Child STC</h2>
            <p class="priceSubtitle">Monday, Wednesday (ALL DAY) + 12PM other Weekdays</p>
            <p class="priceNumber">AUD 11.00</p>
            <p class="priceSubtitle">All Other Times</p>
            <p class="priceNumber">AUD 15.30</p>
            <p class="textMuted"></p>
        </div>
        <div class="infoDiv">
            <h2 class="priceMain">First Class Adult FCA</h2>
            <p class="priceSubtitle">Monday, Wednesday (ALL DAY) + 12PM other Weekdays</p>
            <p class="priceNumber">AUD 24.00</p>
            <p class="priceSubtitle">All Other Times</p>
            <p class="priceNumber">AUD 30.00</p>
            <p class="textMuted"></p>
        </div>
        <div class="infoDiv">
            <h2 class="priceMain">First Class Concession FCP</h2>
            <p class="priceSubtitle">Monday, Wednesday (ALL DAY) + 12PM other Weekdays</p>
            <p class="priceNumber">AUD 22.50</p>
            <p class="priceSubtitle">All Other Times</p>
            <p class="priceNumber">AUD 27.00</p>
            <p class="textMuted"></p>
        </div>
        <div class="infoDiv">
            <h2 class="priceMain">First Class Child FCC</h2>
            <p class="priceSubtitle">Monday, Wednesday (ALL DAY) + 12PM other Weekdays</p>
            <p class="priceNumber">AUD 21.00</p>
            <p class="priceSubtitle">All Other Times</p>
            <p class="priceNumber">AUD 24.00</p>
            <p class="textMuted"></p>
        </div>



    </section>

    <section id="showing">

        <div class="row">

            <div class="column">

                <div class="smallCard">

                    <div class="row">

                        <div class="column" id="avengersPoster">
                            <img src='../../media/avengers.jpg' alt='Avengers poster' height=240 />
                        </div>

                        <div class="column">

                            <h3>Avengers: Endgame <span class="movieRating">PG-13</span></h3>
                            <p>Wednesday: 9pm</p>
                            <p>Thursday: 9pm</p>
                            <p>Friday: 9pm</p>
                            <p>Saturday: 6pm</p>
                            <p>Sunday: 6pm</p>
                        </div>

                    </div>
                </div>

            </div>

            <div class="column">

                <div class="smallCard">

                    <div class="row">

                        <div class="column" id="topEndWeddingPoster">
                            <img src='../../media/top-end-wedding.jpg' alt='Top End Wedding poster' height=240 />
                        </div>

                        <div class="column">

                            <h3>Top End Wedding <span class="movieRating">M</span></h3>
                            <p>Monday: 6pm</p>
                            <p>Tuesday: 6pm</p>
                            <p>Saturday: 3pm</p>
                            <p>Sunday: 3pm</p>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <br>

        <div class="row">

            <div class="column">

                <div class="smallCard">
                    <div class="row">

                        <div class="column" id="dumboPoster">
                            <img src='../../media/Dumbo.png' alt='Dumbo poster' height=240 />

                        </div>

                        <div class="column">

                            <h3>Dumbo <span class="movieRating">PG</span></h3>
                            <p>Monday: 12pm</p>
                            <p>Tuesday: 12pm</p>
                            <p>Wednesday: 6pm</p>
                            <p>Thursday: 6pm</p>
                            <p>Friday: 6pm</p>
                            <p>Saturday: 12pm</p>
                            <p>Sunday: 12pm</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="column">

                <div class="smallCard">
                    <div class="row">

                        <div class="column" id="theHappyPrincePoster">
                            <img src='../../media/The-Happy-Prince.jpg' alt='The Happy Prince poster' height=240 />

                        </div>

                        <div class="column">

                            <h3>The Happy Prince <span class="movieRating">R</span></h3>
                            <p>Wednesday: 12pm</p>
                            <p>Thursday: 12pm</p>
                            <p>Friday: 12pm</p>
                            <p>Saturday: 9pm</p>
                            <p>Sunday: 9pm</p>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        <br>
        <br>



        <div class="row" id='synopsisACT'>

            <div class="synopsisArea">

                <div class="bigCard">

                    <div class="row">

                        <div class="column">
                            <h2><span class="movieName">Avengers: Endgame</span> <span class="movieRating">PG-13</span>
                                </h3>
                                <br>
                                <br>
                                <br>
                                <h3>Plot description: </h3>
                                <p class='plotDescription'>After the devastating events of Avengers: Infinity War
                                    (2018),
                                    the universe is
                                    in ruins. With the help of remaining allies, the Avengers assemble once more in
                                    order to
                                    reverse Thanos'
                                    actions and restore balance to the universe.</p>
                        </div>

                        <div class="column">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/TcMBFSGVi1c"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="row">
                        <div class="column">
                            <h4>Make a Booking: </h4>
                        </div>

                        <div class="column">
                            <button class="movieTimeButton">Wednesday: 9pm</button>
                            <button class="movieTimeButton">Thursday: 9pm</button>
                            <button class="movieTimeButton">Friday: 9pm</button>
                            <button class="movieTimeButton">Saturday: 6pm</button>
                            <button class="movieTimeButton">Sunday: 6pm</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <!-- new movie start (2)-->

        <div class="row" id="synopsisRMC">

            <div class="synopsisArea">

                <div class="bigCard">

                    <div class="row">

                        <div class="column">
                            <h2><span class="movieName">Top End Wedding</span> <span class="movieRating">M</span></h3>
                                <br>
                                <br>
                                <br>
                                <h3>Plot description: </h3>
                                <p ​class='plotDescription'>Lauren and Ned are engaged, they are in love, and they have
                                    just ten days to find Lauren's mother who has gone AWOL somewhere in the remote far
                                    north of Australia, reunite her parents and pull off their dream wedding.</p>
                        </div>

                        <div class="column">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/uoDBvGF9pPU"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="row">
                        <div class="column">
                            <h4>Make a Booking: </h4>
                        </div>

                        <div class="column">
                            <button class="movieTimeButton">Monday: 6pm</button>
                            <button class="movieTimeButton">Tuesday: 6pm</button>
                            <button class="movieTimeButton">Saturday: 3pm</button>
                            <button class="movieTimeButton">Sunday: 3pm</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- new movie end (2) -->

        <!-- new movie start (3)-->

        <div class="row" id="synopsisANM">

            <div class="synopsisArea">

                <div class="bigCard">

                    <div class="row">

                        <div class="column">
                            <h2><span class="movieName">Dumbo</span> <span class="movieRating">PG</span></h3>
                                <br>
                                <br>
                                <br>
                                <h3>Plot description: </h3>
                                <p ​class='plotDescription'>A young elephant, whose oversized ears enable him to fly,
                                    helps save a struggling circus, but when the circus plans a new venture, Dumbo and
                                    his friends discover dark secrets beneath its shiny veneer.</p>
                        </div>

                        <div class="column">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/7NiYVoqBt-8"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="row">
                        <div class="column">
                            <h4>Make a Booking: </h4>
                        </div>

                        <div class="column">
                            <button class="movieTimeButton">Monday: 12pm</button>
                            <button class="movieTimeButton">Tuesday: 12pm</button>
                            <button class="movieTimeButton">Wednesday: 6pm</button>
                            <button class="movieTimeButton">Thursday: 6pm</button>
                            <button class="movieTimeButton">Friday: 6pm</button>
                            <button class="movieTimeButton">Saturday: 12pm</button>
                            <button class="movieTimeButton">Sunday: 12pm</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- new movie end (3)-->

        <!-- new movie start (4)-->

        <div class="row" id="synopsisAHF">

            <div class="synopsisArea">

                <div class="bigCard">

                    <div class="row">

                        <div class="column">
                            <h2><span class="movieName">The Happy Prince</span> <span class="movieRating">R</span></h3>
                                <br>
                                <br>
                                <br>
                                <h3>Plot description: </h3>
                                <p ​class='plotDescription'>The untold story of the last days in the tragic times of
                                    Oscar Wilde, a person who observes his own failure with ironic distance and regards
                                    the difficulties that beset his life with detachment and humor.</p>
                        </div>

                        <div class="column">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/4HmN9r1Fcr8"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="row">
                        <div class="column">
                            <h4>Make a Booking: </h4>
                        </div>

                        <div class="column">
                            <button class="movieTimeButton">Wednesday: 12pm</button>
                            <button class="movieTimeButton">Thursday: 12pm</button>
                            <button class="movieTimeButton">Friday: 12pm</button>
                            <button class="movieTimeButton">Saturday: 9pm</button>
                            <button class="movieTimeButton">Sunday: 9pm</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- new movie end (4)-->
        <form action="https://titan.csit.rmit.edu.au/~e54061/wp/lunardo-formtest.php">
            <div class="row">
                <div class="bigCard">
                    <div class="row">
                        <div class="column">
                            <div class="row">
                                <p> <span id="movieTitle">Movie Title</span> - <span>Day</span> - <span>Time</span></p>
                            </div>

                            <div class="row">
                                <div class="formCard">
                                    <h3>Standard Seats</h3>

                                    <label for="seats[STA]">Adults

                                        <select name="seats[STA]">
                                            <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>

                                    </label>
                                    <br>
                                    <label for="seats[STP]">Concession

                                        <select name="seats[STP]">
                                            <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>

                                    </label>
                                    <br>
                                    <label for="seats[STC]">Child

                                        <select name="seats[STC]">
                                            <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>

                                    </label>
                                </div>

                                <br>
                                <br>
                                <br>

                                <div class="formCard">
                                    <h3>Standard Seats</h3>

                                    <label for="seats[FCA]">Adults

                                        <select name="seats[FCA]">
                                            <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>

                                    </label>
                                    <br>
                                    <label for="seats[FCP]">Concession

                                        <select name="seats[FCP]">
                                            <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>

                                    </label>
                                    <br>
                                    <label for="seats[FCC]">Child

                                        <select name="seats[FCC]">
                                            <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>

                                    </label>
                                </div>

                            </div>

                        </div>

                        <div class="column">
                            <label for="cust[name]">Name:</label>
                            <input type="text" id="cust[name]" name="name" placeholder="Your name" required>
                            <br>
                            <label for="cust[email]">
                                Email:
                                <input type="cust[email]" id="email" name="email" placeholder="Your email" required>
                            </label>
                            <br>
                            <label for="cust[mobile]">Mobile:</label>
                            <input type="text" id="cust[mobile]" name="mobile" placeholder="Your mobile number">
                            <br>
                            <label for="cust[card]">Credit Card:</label>
                            <input type="text" id="cust[card]" name="credit-card" placeholder="Your Credit Card number">
                            <br>
                            <label for="cust[expiry]">Expiry</label>
                            <input type="month" name="cust[expiry]">
                        </div>

                        <div class="column">



                        </div>
                    </div>


                    <!-- TODO: make sure this is at the bottom -->
                    <div class="row">
                        <div>
                            <label for="cust[payment]">Total $</label>
                            <input id="TotalC" name="cust[payment]" readonly>
                        </div>

                        <button type="submit" name="order" id="orderButton">Order</button>
                    </div>
                </div>
            </div>

        </form>


    </section>

    <footer class="footer">
        <div class="inner-footer">
            <p>Lunardo Cinema phone: 0412345678 </p>
            <p>Email: Lunardo@Cinema.net Address: Someplace Somewhere Vic</p>
            <br>
            <p>Zaid Soboh</p>
            <p>Student ID: s3481151</p>
            <p>s3481151@student.rmit.edu.au</p>
            <p><a href="https://github.com/s3481151/wp" target="_blank"> GitHub repository</a></p>


            <div>
                <button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button>
            </div>
    </footer>
    <script type="text/javascript" src="script.js"></script>
    <!-- <script src="js/wireframe.js" async defer></script> -->
</body>

</html>