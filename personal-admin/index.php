<html>
    <head>
        <?php
            session_start();
            if(!isset($_SESSION['adminLogged'])){
                header("Location: http://www.baileydawson.uk/personal-admin/enterpass.php");
                exit();
            }
        ?>
        <title>Bailey Dawson - Blog Builder</title>
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
                <ul class="navbar">
                <li class="navbar"><a href="../index.php">Non Admin</a></li>
                <li class="active navbar"><a href="index.php">Admin Home</a></li>
                <li class="navbar"><a href="projectbuilder.php">Project Builder</a></li>
                <li class="navbar"><a href="blogbuilder.php">Blog Builder</a></li>
                <li class="navbar"><a href="contactview.php">Contact Viewer</a></li>
                </ul>
            </ul>
            <form method="POST" action="enterpass.php">
                <input value="Log Out" name="logout" type="submit">
            </form>
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