<?php
    $isProduction = false;

    if($isProduction == true){
        $user = "(production username)";
        $password = "(production password)";
        $dbname = "(production db name)";
    }
    else{
        $user = "(test username)";
        $password = "(test password)";
        $dbname = "(test db name)";
    }

    $con = mysqli_connect("127.0.0.1", $user, $password, $dbname);

    $response = array();
    $response["success"] = false;

    if(!$con){
        //echo 'error1 <br>';
        echo json_encode($response);
        exit();
    }

    mysqli_query($con, 'SET NAMES utf8');
?>