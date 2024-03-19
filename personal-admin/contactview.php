<html>
    <head>
        <?php
            session_start();
            if(!isset($_SESSION['adminLogged'])){
                header("Location: http://www.baileydawson.uk/personal-admin/enterpass.php");
                exit();
            }

            include '../globals.php';

            // Create connection
            $conn = new mysqli($server, $username, $password, $db);

            // Check connection
            if ($conn->connect_error) {
                die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
            }
        ?>
        <title>Bailey Dawson - Contact Viewer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <link rel="stylesheet" href="../css/main.css">

        <style>
            .border{
                border: 2px solid black;
                padding 1%;
            }
            .top{
                font-weight: bold;
            }
            .item{
                height: 15%;

            }
            .centerAlign{
                text-align:center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Bailey-Tyreese Dawson</h1>
            </div>
        </div>
        <div class="container">
            <ul class="navbar">
                <ul class="navbar">
                <li class="navbar"><a href="../index.php">Non Admin</a></li>
                <li class="navbar"><a href="index.php">Admin Home</a></li>
                <li class="navbar"><a href="projectbuilder.php">Project Builder</a></li>
                <li class="navbar"><a href="blogbuilder.php">Blog Builder</a></li>
                <li class="active navbar"><a href="contactview.php">Contact Viewer</a></li>
                </ul>
            </ul>
            <form method="POST" action="enterpass.php">
                <input value="Log Out" name="logout" type="submit">
            </form>
        </div>
        <?php
        if($_POST['view']){
            $sql = "UPDATE ContactForm SET Viewed='1' WHERE ID=".$_POST['ID'];
            if ($conn->query($sql) === TRUE) {
                echo "<p class='centerAlign'>Successfully viewed</p>";
            } else {
               echo "<p class='top centerAlign'>ERROR</p>";
            }
        }
        ?>
        <div class="container"  style='width:100%;'>
            <?php
                $item_start = "<div class='row'>";

                $view_start = "<div class='item border col-sm-2'><form method='POST'><input type='hidden' name='ID' value='";
                $view_end = "'><input type='submit' name='view' value='Viewed'></form></div>";

                $sec_start = "<div class='item border col-sm-2'>";
                $sec_end = "</div>";

                $item_end = "</div>";

                $sql ="SELECT * FROM `ContactForm` WHERE Viewed='0'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<div class='row'>
                        <div class='top border col-sm-2'>
                            Name
                        </div>
                        <div class='top border col-sm-2'>
                            Email
                        </div>
                        <div class='top border col-sm-2'>
                            Message
                        </div>
                        <div class='top border col-sm-2'>
                            Time
                        </div>
                        <div class='top border col-sm-2'>
                            IP
                        </div>
                        <div class='top border col-sm-2'>
                            Mark as Viewed
                        </div>
                    </div>";
                // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo $item_start;
                        echo $sec_start . $row['Name'] . $sec_end;
                        echo $sec_start . $row['Email'] . $sec_end;
                        echo $sec_start . $row['Message'] . $sec_end;
                        echo $sec_start . gmdate("g:ia jS F Y", $row['TimeStamp']) . $sec_end;
                        echo $sec_start . $row['IP'] . $sec_end;
                        echo $view_start . $row['ID'] . $view_end;
                        echo $item_end;
                    }
                }else{
                    echo "<p class='centerAlign'>No requests found</p>";
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