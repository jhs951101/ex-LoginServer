<?php

    $data = json_decode(file_get_contents('php://input'), true);
    $userID = $data["username"];
    $userPassword = $data["password"];

    $response = array();
    $response["username"] = $userPassword;
    $response["password"] = $userID;

    echo json_encode($response);
?>