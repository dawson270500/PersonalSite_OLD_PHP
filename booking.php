<!DOCTYPE html>
<?php   
    include 'globals.php';
?>
<html lang="en">
    <head>
        <title>Bailey Dawson - Booking</title>
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
                <li class="active navbar"><a href="booking.php">Booking</a></li>
                <li class="navbar"><a href="contact.php">Contact</a></li>
                <li class="navbar"><a href="about.php">About me</a></li>
                <li class="navbar"><a href="twitch.php">Twitch</a></li>
            </ul>
        </div>
        <div class="container"> 
            <div class="row">
            <div class="col-sm-6">
                <h4>Websites</h4>
                <p>Please see details of websites that I can create for you</p>
                <p>The site can look however you want and will have similar features to this 
                website You can have as many blog feeds as you wish, and a portfolio 
                (with as many categories as you wish) </p>
                <p>The initial fee for the website creation is £100, changes to functionality after 
                    the site is completed will be priced by me when the request is made depending
                    on the scope of the change.</p>
                <p>To view sites I have made in the past please goto the <a href="projects.php">projects page.</a></p>
                <p>Business sites are priced on a per case basis.</p>
                <p>
                    I can also host this website for you, see below for details
                    <ul>
                        <li>Low End - £2 per month + domain fee</li>
                        <li>Mid Range - £12 per month + domain fee</li>
                        <li>High End - £26 per month + domain fee</li>
                    </ul>
                </p>   

                <p>
                    An email address with your custom domain if you host with me can also
                    provided for an extra fee, at the following price points:
                    <ul>
                        <li>1 account, 10,000 email storage - free, included in hosting</li>
                        <li>1 accounts, 60,000 email storage - £5 per month</li>
                        <li>5 accounts, 50,000 email storage per account - £16 per month</li>
                        <li>10 accounts, 50,000 email storage per account - £26 per month</li>
                    </ul>
                </p>
                <p>I can move you above the tiers at any time, please just contact me about that. It may take up to a week for the change to be made.</p>
                To book me for a personal site please contact me below.
            </div>
            <div class="col-sm-6">
                <h4>General Programs</h4>
                <p>I can create a custom program to do anything you need it to. For more infomation on this please contact me below</br>
                These programs are priced on a case by case basis<br>
                These programs can also connect to a server to do actions if this is required, server host fees are below</p>
                <ul>
                    <li>Low End - £2 per month</li>
                    <li>Mid Range - £12 per month</li>
                    <li>High End - £26 per month</li>
                </ul>
                <p>If they only require a database (a server with no processing of its own) to run the price is currently £1.50 per month, this may increase in the future.</p>
            </div>
            </div>
            <div class="row">
                <h4>Request form</h4>
                <p>Please fill in the below with as much detail as you can. 
                I can produce a POC (Proof of concept) for your request, there is a £10 fee for this. If you would like this please mention it in the request details.<br>
                You will receive an email from baileydawson@baileydawson.uk in response to this request.</p>
                <p>
                <?php
                    if(isset($_POST['reqFormSub'])){
                        // Create connection
                        $conn = new mysqli($server, $username, $password, $db);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
                        }
                        $stmt = $conn->prepare("INSERT INTO `BookingRequests` (`Name`, `Email`, `Details`, `IP`, `TimeStamp`)
                        VALUES (?, ?, ?, '".$_SERVER['REMOTE_ADDR']."', '".time()."')");
                        $stmt->bind_param('sss', $_POST['name'], $_POST['email'], $_POST['message']);
                        if($stmt->execute()){
                            echo "Thank you for submitting a booking request.";
                        }else{
                            echo "Submission failed. " . $stmt->error;
                        }
                        $conn->close();
                    }
                ?>
                <form method="POST" id="reqForm">
                    Name <input type="text" name="name"><br>
                    Email <input style="margin-left:2px;" type="email" name="email"><br>
                    Request details<br>
                    <textarea style="width:30%;height:10%;" name="message" form="reqForm" required></textarea><br>
                    <input type="submit" name="reqFormSub" value="Send request">
                </form>
                </p>
            </div>
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