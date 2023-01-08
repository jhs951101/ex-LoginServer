<?php
    include 'components/controller/LoginController.php';

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

    $username = $_GET['username'];
    $password = $_GET['password'];
    $name = $_GET['name'];

    echo json_encode((new LoginController())->signup($username, $password, $name), JSON_UNESCAPED_UNICODE);
?>