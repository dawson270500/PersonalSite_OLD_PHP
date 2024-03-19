<!DOCTYPE html>
<html lang="en">
    <?php   
        include 'globals.php';
        
        // Create connection
        $conn = new mysqli($server, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
            die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
        }
    ?>
    <head>
        <title>Bailey Dawson - Contact</title>
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
                <li class="active navbar"><a href="contact.php">Contact</a></li>
                <li class="navbar"><a href="about.php">About me</a></li>
                <li class="navbar"><a href="twitch.php">Twitch</a></li>
            </ul>
            <h2>Contact Form</h2>
            <?php
                if(isset($_POST['contFormSub'])){
                    $stmt = $conn->prepare("INSERT INTO `ContactForm` (`Name`, `Email`, `Message`, `IP`, `TimeStamp`)
                    VALUES (?, ?, ?, '".$_SERVER['REMOTE_ADDR']."', '".time()."')");
                    $stmt->bind_param('sss', $_POST['name'], $_POST['email'], $_POST['message']);
                    if($stmt->execute()){
                        echo "Thank you for submitting a contact request.";
                    }else{
                        echo "Submission failed. " . $stmt->error;
                    }
                }
            ?>
            <p>If you wish to contact me fill out the form below to send a contact request.<br>
            Currently <?php
                $sql ="select count(case when Viewed= '0' then 1 else null end) as Count from ContactForm";
                $echome=0;
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $echome=$row['Count'];
                    }
                }
                echo $echome;
            ?> contact forms are waiting to be read.<br>
            If you are a client of mine requesting a change or reporting an issue, please contact me on the client discord.<br>
            Contact requests will get viewed with 1 week, I may not reply to all contact requests</p>
            <form method="POST" id="contForm">
                Name<br> <input type="text" style="width:15%" name="name" required><br>
                Email<br> <input type="email" style="width:15%" name="email" required><br>
                Message<br> <textarea style="width:15%" name="message" form="contForm" required></textarea><br>
                <br><input type="submit" name="contFormSub">
            </form>
            <br>
            <p>You can also contact me below as well as give me money to support the OpenSource projects I work on.</p>
            <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="dawson270500" data-color="#FFDD00" data-emoji="🍺"  data-font="Lato" data-text="Buy me a pint" data-outline-color="#000000" data-font-color="#000000" data-coffee-color="#ffffff" ></script>
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

<?php
 $conn->close();
?>