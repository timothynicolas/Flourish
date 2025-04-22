<?php
    $db_server = "localhost";
    $db_user = "u185868764_flourish_db";
    $db_pass = "Flourish_12345";
    $db_name = "u185868764_flourish_db";
    $conn = "";


    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    }catch(mysqli_sql_exception){
        echo"Could not connect";
    }

    // if($conn){
    //     echo"You are connected<br>";
    // }
?>