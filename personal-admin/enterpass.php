<?php
    $pass = "1ys%1tXc#7NfvEc9FAC*rHWTNSfk3m9krvwXmsIi9rBR95CtBh";
    if($_POST['logout']){
        session_start();
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        header("Location: http://www.baileydawson.uk");
        exit();
    }

    if($_POST['passSub']){
        if($_POST['pass'] == $pass){
            session_start();
            $_SESSION['adminLogged']="1";

            header("Location: http://www.baileydawson.uk/personal-admin");
            exit();
        }
    }
?>

<form method="POST">
    User: <input type="text" name="user"><br>
    Pass: <input type="password" name="pass"><br>
    <input type="submit" name="passSub">
</form>