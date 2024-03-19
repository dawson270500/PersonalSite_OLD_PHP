<!DOCTYPE html>
<html lang="en">
    <?php   
        include '../globals.php';

        // Create connection
        $conn = new mysqli($server, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
            die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
        }
    ?>
    <head>
        <title>Bailey Dawson - <?php 
        $name = "";
        $lang = "";
        $link = "";
        $text = "";
            $sql ="SELECT * FROM `Project` WHERE ID=".$_GET['id'];
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    $name = $row['Name'];
                    $lang =  $row['Lang'];
                    $link =  $row['Link'];
                    $text = $row['Text'];
                }
            }
            echo $name;
        ?></title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/blog.css">

        <style>
            a.underline{
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-8">
                    <h1>Bailey-Tyreese Dawson</h1>
                    </div>
                    <div class="col-sm-4" style=" position: absolute; right: 0px;">
                    <img src="../img/propic.jpg" alt="My Profile Picture" style="border-radius: 50%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <ul class="navbar">
                <li class="active navbar"><a href="../projects.php">Go back</a></li>
            </ul>
        </div>
        <div class="container">

                <?php
                    $br = "<br>";

                    $name_start = "<h3>";
                    $name_end = "</h3>";

                    $lang_start = "<p>Language: ";

                    $link_start = "<a target='_blank' rel='noopener noreferrer' class='underline' href='";
                    $link_end = "'>View Project</a></p>";
                    echo $name_start . $name . $name_end;
                    echo $lang_start . $lang . $br;
                    echo $link_start . $link . $link_end;
                    echo $text;
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