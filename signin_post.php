<?php
    include "components/controller/LoginController.php";

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");

    $username = $_POST["username"];
    $password = $_POST["password"];

    echo json_encode((new LoginController())->signin($username, $password), JSON_UNESCAPED_UNICODE);
?>