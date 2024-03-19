<?php
    include 'globals.php';
?>
<script>
var click_count = 0;
function count(){
    click_count = click_count + 1;
    if(click_count == 5){
        window.location.href = "https://www.baileydawson.uk/personal-admin/";
    }
}
</script>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bailey Dawson</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <img onclick="count()" class="mobileHide" src="img/propic.jpg" alt="My Profile Picture" style="border-radius: 50%;aspect-ratio: 1/1;">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <ul class="navbar">
                <li class="active navbar"><a href="index.php">Home</a></li>
                <li class="navbar"><a href="blog.php">Blog</a></li>
                <li class="navbar"><a href="projects.php">Projects</a></li>
                <li class="navbar"><a href="booking.php">Booking</a></li>
                <li class="navbar"><a href="contact.php">Contact</a></li>
                <li class="navbar"><a href="about.php">About me</a></li>
                <li class="navbar"><a href="twitch.php">Twitch</a></li>
            </ul>
            <p>Hi, this is my personal site. On here you can find a blog, on which I will post anything I find interesting.
                 Could be quite literally anything. I also have links to all my projects and some explanations on how I did things</p>
            <p>I also host various things for a few people that I know on this server, you are more than welcome to have a poke 
                around and see what you can find on here.</p>
            <p>I create websites for people for a fee, for more details please look at the bookings page</p>
            <p>This site will slowly grow over time, as I find more things to add to it. But for now this all you get.</p>
        </div>
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