<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2</title>
    
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
    <script src='../wireframe.js'></script>
  </head>

  <body>

    <header>
      <!-- <div>Put company logo and name here</div> -->
      <div><img src='../../media/RMIT-Logo.png' alt='RMIT University logo' height=80 />Lunardo Cinema
      </div>
    </header>

    <nav>
        <li><a href="#Now Showing" >Now Showing</a></li>
        <li><a href="#Prices" >Prices</a></li>
        <li><a href="#About Us" >About Us</a></li>
    </nav>

    <main>
      <article id='Website Under Construction'>
    <!-- Creative Commons image sourced from https://pixabay.com/en/maintenance-under-construction-2422173/ and used for educational purposes only -->
        <img src='../../media/website-under-construction.png' alt='Website Under Construction' />
      </article>

      <article id='about-me'>
        <h2>About me</h2>
        <p>
          <img src='../media/avatar.png' width='200' alt='my photo' />
        </p>
        <section id="more-about-me">
          <div>Who is your tutor / instructor</div>
          <div>Trevor Reynolds</div>

          <div>Who is your labber</div>
          <div>Trevor Reynolds</div>

          <div>Have you any programming or web design experience?</div>
          <div>Bits and pieces i picked up doing other subjects that involved web programming</div>

          <div>Do you see yourself as a programmer or designer, or both?</div>
          <div>Programer</div>

          <div>What has brought you to this course at RMIT?</div>
          <div>I am think about starting my programming career as a web-developer</div>

          <div>What are you hoping to get out of the course?</div>
          <div>A genral understanding about front and back-end of web programming</div>

          <div>Assignments allow for individual or paried work. What strengths do you have and what strengths would you like your assignment partner to have?</div>
          <div>I am good at analysing problems and finding how to fix them</div>

          <div>What websites do you use the most? (NB: "family friendly" !)</div>
          <div>http://novelupdates.com and https://www.dotabuff.com/</div>

          <div>Do you have any interests or hobbies?</div>
          <div>Reading, Gaming, Tennis and Anime </div>
        </section>
      </article>
      <!-- <aside>
        <div align='center'>Deprecated code sample.</div>
      </aside> -->
      
    </main>

    <footer>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

  </body>
</html>
