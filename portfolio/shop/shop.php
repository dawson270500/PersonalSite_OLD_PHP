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
            .product{
                text-align: center;
            }
            .imgProduct {
                width:70%;
                aspect-ratio:1/1;
            }
            .button{
                background-color: #dfdfdf; /* Green */
                border: none;
                color: black;
                margin: 1%;
                padding: 1%;
                height: 5%;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 10pt;
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
                    <li class="active navbar"><a href="shop.php">Shop</a></li>
                    <li class="navbar"><a href="news.php">News</a></li>
                    <li class="navbar"><a href="contact.php">Contact us</a></li>
                </ul>
                <p>Below you can see all the products of The best shop, which are all of course only the best.</p>
            </div>
        </div>
        <div class="container">
        <!--Script for setting values after search--><script>
            function set_qText($val){
                document.getElementById('qText').value = $val;
            }
            function set_qSort($val){
                document.getElementById('dropDown').selectedIndex = $val;
            }
        </script>
            <p><form method="GET">
                <input type="text" placeholder="Search for..." id="qText" name="qText">
                <select id="dropDown" name="qSort">
                    <option value="NULL">Sort by...</option>
                    <option value="Alpha">Alphabetically</option>
                    <option value="price_LH">Price - Low to High</option>
                    <option value="price_HL">Price - High to Low</option>
                </select>
                <input type="submit" class="button" name="qSearch" value="Search">
                <input type="submit" class="button" name="cSearch" value="Clear">
            </form></p>
            <?php
                // Create connection
                $conn = new mysqli($server, $username, $password, $db);

                // Check connection
                if ($conn->connect_error) {
                    die("Report failure to DawsonThePagan, code 1. Connection failed: " . $conn->connect_error);
                }

                $row_starter = "<div class='row'>";
                $div_ender = "</div>";

                $item_starter = "<a href='";
                $item_link_end = "'><div class='product col-sm-4'><h4>";
                $item_img_start = "</h4><img class='imgProduct' src='";
                $item_img_end_price_start = "'><p>Price: ";
                $item_end = "</p></div></a>"; 

                $sql ="SELECT * FROM `Products` ORDER BY `Name` ASC";
                // Handles searching and sorting
                if(isset($_GET['qSearch'])){
                    echo "<script>";
                    $sql ="SELECT * FROM `Products`";
                    if($_GET['qText'] != ""){
                        $clean_text = clean_input($_GET['qText']);
                        $sql = $sql . " WHERE `Name` LIKE '%".$clean_text."%'";
                        echo "set_qText(\"".$clean_text."\");";
                    }
                    switch ($_GET['qSort']){
                        case "price_HL":
                            $sql = $sql . " ORDER BY `Price` DESC";
                            echo "set_qSort(3);";
                            break;
                        case "price_LH":
                            $sql = $sql . " ORDER BY `Price` ASC";
                            echo "set_qSort(2);";
                            break;
                        default:
                            $sql = $sql . " ORDER BY `Name` ASC";
                            echo "set_qSort(1);";
                            break;
                    }
                    echo "</script>";
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                    $count_in_row = 0;
                    $row_echo = false;
                    echo $row_starter;
                    while($row = $result->fetch_assoc()) {
                        
                        echo $item_starter;
                        echo "item.php?q=".$row['PID'].$item_link_end;
                        echo $row['Name'].$item_img_start;
                        echo $row['Img']."' alt='".$row['Name'].$item_img_end_price_start;
                        $price_calc = number_format(($row['Price'] /100), 2, '.', ',');
                        echo '£'.$price_calc . $item_end;

                        $count_in_row = $count_in_row + 1;
                        if($count_in_row == 3){
                            echo $div_ender . $row_starter;
                            $count_in_row = 0;
                        }
                    }
                    echo $div_ender;
                }
                else {
                    echo "No proucts match your search";
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