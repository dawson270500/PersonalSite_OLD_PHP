<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bailey Dawson - About</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Latest compiled and minified CSS -->
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
                    <img class="mobileHide" src="img/propic.jpg" alt="My Profile Picture" style="border-radius: 50%;">
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
                <li class="active navbar"><a href="about.php">About me</a></li>
                <li class="navbar"><a href="twitch.php">Twitch</a></li>
            </ul>
            <p>Welcome to my about page. I'm not entirely sure what to list here so use the contact page if you have suggestions.</p>
            <p>Hi, I'm Bailey. I'm <?php // Always shows the correct age, including my birthday into the mix
                if(date("M") == 5 && date("D") >= 27 || date("m") > 5 ) {
                    echo date("Y") - 2000;
                } else{
                    echo date("Y") - 2001;
                }
            ?> years old and I'm from West Yorkshire in the North of England. Online I go as DawsonThePagan. This is my personal 
            website, I wrote this and everything on this server in my free time, mainly because I was bored and wanted something to do. 
            I currently work at a company called Cennox, which make software for banks. In my free time I spend way too long playing video games, 
            as apparently I am boring. I also manage to watch a lot of random TV shows, which I may make some kind of section about at some point.</p>
             <p>In some other news, I have dyslexia, so please ignore the few spell mistakes lying around this site. 
                I have used a spell checker so its just whatever got past that</p>
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