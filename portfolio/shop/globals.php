<?php
    $username="Portfolio-Shop-Reader";
    $password="";
    $server="";
    $db="Portfolio-Shop";

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function genKey($len) {
        $key = "";
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        for ($i = 0; $i < $len; $i++) {
            $n = rand(0, strlen($alphabet) - 1);
            $key = $key . $alphabet[$n];
        }
        return $key;
    }
?>