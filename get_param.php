<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

    $response = array();
    $response['success'] = false;

    $param1 = $_GET['param1'];
    $param2 = $_GET['param2'];

    $response['param1'] = $param1;
    $response['param2'] = $param2;

    $response['success'] = true;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>
