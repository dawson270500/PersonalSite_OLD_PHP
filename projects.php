<!DOCTYPE html>
<html lang="en">
    <head>
    <?php   
        include 'globals.php';
        
        // Create connection
        $conn = new mysqli($server, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
            die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
        }
    ?>
        <title>Bailey Dawson - Projects</title>
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <style>
            /* List columns */
            .ListCol {
                height: 500px;
                width: 800px;
                padding:1%;
                background-color: #ebeae8;
                text-align: center;
                border-color: white;
                border-style: solid;
                border-top-width: 1px;
                border-radius: 1em;
            }
            /* List side, changes border */
            .RightCol {
                border-left-width: 1px;
            }
            .LeftCol{
                border-right-width: 1px;
            }

            /* Main content class */
            .mainCont{
                width: 90%;
            }

            /* Screen size change handle */
            @media screen and (max-width: 1400px) {
                .voteBut{
                    margin-top: 2%;
                }
                .ListCol {
                    height: 50%;
                }
            }
            @media screen and (max-width: 768px) {
                .mainCont{
                    width: 100%;
                }
                .ListCol {
                    height: 35%;
                }
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
                    <div class="col-sm-4" style="position: absolute; right: 0px;">
                    <img class="mobileHide" src="img/propic.jpg" alt="My Profile Picture" style="border-radius: 50%;">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <ul class="navbar">
                <li class="navbar"><a href="index.php">Home</a></li>
                <li class="navbar"><a href="blog.php">Blog</a></li>
                <li class="active navbar"><a href="projects.php">Projects</a></li>
                <li class="navbar"><a href="booking.php">Booking</a></li>
                <li class="navbar"><a href="contact.php">Contact</a></li>
                <li class="navbar"><a href="about.php">About me</a></li>
                <li class="navbar"><a href="twitch.php">Twitch</a></li>
            </ul>
            <p>This is a list of personal projects I have worked on. It has a link, the main language it was written in and description of it.
             Click on the project to view more details of the project.</p>
        </div>  
        

        <div class="container mainCont">
       
                <?php
                    $row_start = "<div class='row'>";
                    $left_row_start = "<div class='col-sm-6 ListCol LeftCol'><h3>";
                    $right_row_start = "<div class='col-sm-6 ListCol RightCol'><h3>";
                    $lang_start = "</h3>\n<p>Language: ";
                    $img_start = "</p>\n<img style='max-height: 80%; max-width: 80%;' src='";
                    $img_end = "'>\n";
                    $div_end = "</div>";

                    $link_start = "<a href='viewers/projview.php?id=";
                    $link_middle = "'>";
                    $link_end = "</a>";
                    
                    $sql ="SELECT ID, Name, Lang, Img FROM `Project` ORDER BY ID DESC";
                    $side = 1;
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                    // output data of each row
                        echo $row_start;
                        while($row = $result->fetch_assoc()) {
                            if($side == 1){
                                $side = 2;
                                echo $link_start . $row['ID'] . $link_middle . $left_row_start . $row['Name'] . $lang_start . $row['Lang'];
                                echo $img_start . $row['Img'] . $img_end . $div_end . $link_end . "\n";
                            }
                            else if($side == 2){
                                echo $link_start . $row['ID'] . $link_middle . $right_row_start . $row['Name'] . $lang_start . $row['Lang'];
                                echo $img_start . $row['Img'] . $img_end . $div_end . $link_end . "\n";
                                echo $div_end . $row_start;
                                $side = 1;
                            }
                        }
                    }
                    if ($num_items != 2){
                        echo $div_end;
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