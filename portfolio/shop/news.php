<?php
    include 'globals.php';
?>
<html lang="en">
    <head>
        <title>The best shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <style>
            .newsItem{
                background-color: #eee;
                margin: 0.5em;
                margin-left:0em;
                margin-right:0em;
                padding: 0.2em;
                padding-left: 0.5em;
                padding-right:0.5em;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header row">
                <div class="col-sm-4">
                    <img src="img/icon.svg" alt="Store icon" style="aspect-ratio: 1/1; width: 20%; height: auto;">
                </div>
                <div class="mobileHide col-sm-8">
                    <h1>The best shop</h1>
                </div>
            </div>
            <div class="row">
                <ul class="navbar">
                    <li class="navbar"><a href="index.php">Home</a></li>
                    <li class="navbar"><a href="shop.php">Shop</a></li>
                    <li class="active navbar"><a href="news.php">News</a></li>
                    <li class="navbar"><a href="contact.php">Contact us</a></li>
                </ul>
                <p>See our latest news below</p>
            </div>
        </div>
        <div class="container">
            <?php
                // Create connection
                $conn = new mysqli($server, $username, $password, $db);

                // Check connection
                if ($conn->connect_error) {
                    die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
                }

                $item_starter = "<div class='newsItem row'><h4>";
                $item_time_start = "</h4><p>Posted: ";
                $item_time_end = "</p>";
                $item_end = "</div>"; 

                $sql ="SELECT * FROM `News` ORDER BY `TimeStamp` DESC LIMIT 5 ";
                if($_GET['qShowAll']){
                    $sql ="SELECT * FROM `News` ORDER BY `TimeStamp` DESC";
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row 
                    while($row = $result->fetch_assoc()) {
                        echo $item_starter . $row['Title'];
                        $dateTime = date('H:i d/m/Y', $row['TimeStamp']);
                        echo $item_time_start . $dateTime;
                        echo $item_time_end . $row['Contents'];
                        echo $item_end;
                    }
                }
                else{
                    echo "Unfortchantly we are having some technical difficulties. Please try again later.";
                }

                $conn->close();
            ?>
            <footer>
                <div class="jumbotron">
                    <a class="footer" target='_blank' rel='noopener noreferrer' href="https://www.instagram.com">Instagram</a><br>
                    <a class="footer" target='_blank' rel='noopener noreferrer' href = "https://www.facebook.com">Facebook</a><br>
                    <a class="footer" target='_blank' rel='noopener noreferrer' href="https://www.google.com/maps">Find us</a>
                </div> 
            </footer>
        </div>
    </body>
</html>