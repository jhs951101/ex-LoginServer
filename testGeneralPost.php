<?php

    $userID = $_POST["username"];
    $userPassword = $_POST["password"];

    $response = array();
    $response["username"] = $userPassword;
    $response["password"] = $userID;

    echo json_encode($response);
?>