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
        <title>Bailey Dawson - Project Builder</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/blog.css">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Bailey-Tyreese Dawson</h1>
            </div>
        </div>
        <div class="container">
            <ul class="navbar">
                <li class="navbar"><a href="../index.php">Non Admin</a></li>
                <li class="navbar"><a href="index.php">Admin Home</a></li>
                <li class="active navbar"><a href="projectbuilder.php">Project Builder</a></li>
                <li class="navbar"><a href="blogbuilder.php">Blog Builder</a></li>
                <li class="navbar"><a href="contactview.php">Contact Viewer</a></li>
            </ul>
            <form method="POST" action="enterpass.php">
                <input value="Log Out" name="logout" type="submit">
            </form>
            <?php
                if($_POST['create']){
                    $stmt = $conn->prepare("INSERT INTO Project(`Name`, `Text`, 
                    `Link`, `Lang`) VALUES (?,?,?,?)");
                    $stmt->bind_param('ssss', $_POST['text_title'], $_POST['text_contents'], 
                    $_POST['text_link'], $_POST['text_lang']);
                    if(!$stmt->execute()){
                        echo "<p>Failed to create project, ".$conn->error."</p>";
                    }else{
                        echo "<p>Successfully created</p>";
                    }
                }
            ?>
        </div>
        <div class="container">
            <div class="container">
                <h3 id="gui_title">Lorum Ipsum</h3>
                <p>Language: <span id="gui_lang">Lang</span><br>
                <a class='underline' id="gui_link" href="">View Project</a></p>
                <span id="gui_contents">I'm an example</span>
            </div>
            <br>
            <form method="POST" id="form">
            <p>Name: <input type="text" name="text_title" id="text_title"></p>
            <p>Language: <input type="text" name="text_lang" id="text_lang"></p>
            <p>Link: <input type="text" name="text_link" id="text_link"></p>
            Contents: <br><textarea name="text_contents" id="text_contents" form="form" style="width:40%; height:40%;"></textarea>
            <br><input type="submit" name="create" value="Create">
            </form>
            <script>
                const gui_title = document.getElementById("gui_title");
                const gui_contents = document.getElementById("gui_contents");
                const gui_lang = document.getElementById("gui_lang");
                const gui_link = document.getElementById("gui_link");

                const text_title = document.getElementById("text_title");
                const text_lang = document.getElementById("text_lang");
                const text_link = document.getElementById("text_link");
                const text_contents = document.getElementById("text_contents");

                function update(e){
                    gui_title.innerHTML = text_title.value;
                    gui_contents.innerHTML = text_contents.value;
                    gui_lang.innerHTML = text_lang.value;
                    gui_link.href = text_link.value;
                }

                text_title.addEventListener("change", update);
                text_contents.addEventListener("change", update);
                text_lang.addEventListener("change", update);
                text_lang.addEventListener("change", update);
            </script>
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