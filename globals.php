<?php
    $username="person";
    $password="";
    $server="";
    $db="PersonalSite";

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

    function track($SID) {
        $username="person";
        $password="";
        $server="";
        $db="PersonalSite";

        // Create connection
        $conn = new mysqli($server, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
            $date = date('Y_m_d');
            $time = date('H:i:s');
            $log_file = fopen("tracker/FailLog".$date.".txt", "a");
            fwrite($log_file, $time . " # SQL LOGIN ERROR # " . $conn->connect_error. "\n");
            fclose($log_file);
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

            $sql = "INSERT INTO `tracker`(`IP`, `Country`, `Time`, `SID`) VALUES ('".$ip."','".$details->country."'
            ,'".time()."','".$SID."')";
            $conn->query($sql);
            if (!($conn->query($sql) === TRUE)) {
                $date = date('Y_m_d');
                $time = date('H:i:s');
                $log_file = fopen("tracker/FailLog".$date.".txt", "a");
                fwrite($log_file, $time . " # QUERY ERROR # " . $conn->error . "\n");
                fclose($log_file);
            }
        } 
        $conn->close();       
    }
?>