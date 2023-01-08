<?php
    include 'components/controller/LoginController.php';

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    $password = $data['password'];

    echo json_encode((new LoginController())->signin($username, $password), JSON_UNESCAPED_UNICODE);
?>