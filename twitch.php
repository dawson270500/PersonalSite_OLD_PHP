<?php
    include 'globals.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bailey Dawson - Twitch</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-8">
                    <h1>Bailey-Tyreese Dawson</h1>
                    </div>
                    <div class="col-sm-4" style=" position: absolute; right: 0px;">
                    <img class="mobileHide" src="img/propic.jpg" alt="My Profile Picture" style="border-radius: 50%;aspect-ratio: 1/1;">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <ul class="navbar">
                <li class="navbar"><a href="index.php">Home</a></li>
                <li class="navbar"><a href="blog.php">Blog</a></li>
                <li class="navbar"><a href="projects.php">Projects</a></li>
                <li class="navbar"><a href="booking.php">Booking</a></li>
                <li class="navbar"><a href="contact.php">Contact</a></li>
                <li class="navbar"><a href="about.php">About me</a></li>
                <li class="active navbar"><a href="twitch.php">Twitch</a></li>
            </ul>
            <p>Yes, I do also stream on twitch now. Below will be various information about my stream plus any polls or what not that I am running.
                <br> When I do shot for a follow I normally stream something like American truck simulator or My summer car, other than that I stream
                whatever I feel like.
            </p>
            <a style="text-decoration: underline;" href="https://www.twitch.tv/dawsonthepagan"><p>Go to my twitch by clicking here</p></a>
        </div>
        <div class="container">
            <div style="display: inline-block;"><h2>Schedule</h2></div>
            <div class="button" id="sched_but" onclick="toggle_hide_sched()">Hide</div>
            <div id="sched" class="display: block">
            <p>All times are in British time, with daylight savings when active. Generally I will stream for up to 6 hours.<br>
            I may stream on days not mentioned below, but those are the days where I will definitely be stremaing.</p>
                <h4>Monday - No stream</h4>
                <h4>Tuesday - 7pm till 11pm</h4>
                <h4>Wednesday - No stream</h4>
                <h4>Thursday - No stream</h4>
                <h4>Friday - No stream</h4>
                <h4>Saturday - 6pm till late, shot for follow</h4>
                <h4>Sunday - No stream</h4>
            </div>
        </div>
        <script>
            const sched_elm = document.getElementById("sched");
            const sched_but = document.getElementById("sched_but");
            function toggle_hide_sched(){
                var sched_hide = sched_elm.style.display;
                if(sched_hide == "none"){
                    sched_elm.style.display = "block";
                    sched_but.innerHTML = "Hide";
                }
                else {
                    sched_elm.style.display = "none";
                    sched_but.innerHTML = "Show";
                }
            }
        </script>
        <br>
        <footer>
            <div class="container">
                <div class="jumbotron">
                    <a class="footer" href="https://www.linkedin.com/in/bailey-tyreese-dawson-50a67b195/">LinkedIn</a><br>
                    <a class="footer" href = "mailto:baileydawson@baileydawson.uk">Email: baileydawson@baileydawson.uk</a><br>
                    <a class="footer" href="https://github.com/dawson270500">GitHub</a>
                </div> 
            </div> 
    </footer>
    </body>
</html>