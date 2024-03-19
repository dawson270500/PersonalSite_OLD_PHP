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
        <title>Bailey Dawson - Blog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/blog.css">
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
                <p>Single blog view</p>
            </div>
        </div>
        <div class="container">
            <ul class="navbar">
                <li class="active navbar"><a href="../blog.php?viewlist=1">Go back</a></li>
            </ul>
        </div>
        <div class="container">
            
                <?php
                    $title_start = "<h3 id='gui_title'>";
                    $title_end = "</h3>";
                    $date_start = "Posted on <span class='little' id='gui_date'>";
                    $date_end = "</span><br>";

                    $blog_start = "<div class='blogbox container'>";
                    $contents_start = "<div id='gui_contents'>";
                    $div_end = "</div>";
                    

                    $sql ="SELECT * FROM `Blog` WHERE ID=".$_GET['id'];
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo $blog_start . $title_start . $row['Title'] . $title_end;
                            echo $date_start .  date('d-m-y',$row['TimeStamp']) . $date_end;
                            echo $contents_start . $row['HTML_Content'] . $div_end . $div_end . "<br>";
                        }
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