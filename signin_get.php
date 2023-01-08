<?php
    include "components/controller/LoginController.php";

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");

    $username = $_GET["username"];
    $password = $_GET["password"];

    echo json_encode((new LoginController())->signin($username, $password), JSON_UNESCAPED_UNICODE);
?>