<?php
    include "components/controller/LoginController.php";

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");

    $username = $_POST["username"];
    $password = $_POST["password"];
    $name = $data["name"];

    echo json_encode((new LoginController())->signup($username, $password, $name), JSON_UNESCAPED_UNICODE);
?>