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
        <title>Bailey Dawson - Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/blog.css">
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
                <p>These blogs will cover all sorts of topics, just kind of whatever I have interest in when I'm writing it.</p>
            </div>
        </div>
        <div class="container">
            <ul class="navbar">
                <li class="navbar"><a href="index.php">Home</a></li>
                <li class="active navbar"><a href="blog.php">Blog</a></li>
                <li class="navbar"><a href="projects.php">Projects</a></li>
                <li class="navbar"><a href="booking.php">Booking</a></li>
                <li class="navbar"><a href="contact.php">Contact</a></li>
                <li class="navbar"><a href="about.php">About me</a></li>
                <li class="navbar"><a href="twitch.php">Twitch</a></li>
            </ul>
        </div>
        <div class="container">
                
                <?php
                    $button_all = "<form><input type='hidden' value='1' name='viewlist'><input type='submit' value='View More'></form>";
                    $button_ten = "<form><input type='submit' value='Hide More'><form>";
                    if (isset($_GET['viewlist'])) {
                        echo $button_ten;
                        echo "<p>In list mode, see a list below of all blogs, see a button above to switch back.</p>";
                        echo "<ul>";
                    }
                    else{
                        echo $button_all;
                        echo "<p>Currently will only display 5 latest posts, click on button above to see more</p>";
                    }
                    $title_start = "<h3 id='gui_title'>";
                    $title_end = "</h3>";
                    $date_start = "<span class='lighttext'>Posted on <span id='gui_date'>";
                    $date_end = "</span></span><br>";

                    $blog_start = "<div class='blogbox container'>";
                    $contents_start = "<div id='gui_contents'>";
                    $div_end = "</div>";

                    $list_item_start = "<li class='listitem'><a href='viewers/blogview.php?id=";
                    $list_item_middle="'>";
                    $list_item_middle_2="</a> <span class='lighttext'>";
                    $list_item_end = "</span></li>";
                    
                    $sql ="SELECT * FROM `Blog` ORDER BY ID DESC LIMIT 5";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            if(!isset($_GET['viewlist'])){
                                echo $blog_start . $title_start . $row['Title'] . $title_end;
                                echo $date_start .  date('d-m-y',$row['TimeStamp']) . $date_end;
                                echo $contents_start . $row['HTML_Content'] . $div_end . $div_end . "<br>";
                            }else{
                                echo $list_item_start . $row['ID'] . $list_item_middle . $row['Title'] . $list_item_middle_2;
                                echo "" . date('d-m-y',$row['TimeStamp']) . "" . $list_item_end;

                            }
                        }
                    }
                    if (isset($_GET['viewlist'])) {
                        echo "</ul>";
                    } 
                ?>
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