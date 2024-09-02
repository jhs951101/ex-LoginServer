<?php
    $response = array();
    $response['success'] = false;

    $data = json_decode(file_get_contents('php://input'), JSON_UNESCAPED_UNICODE);
	$num1 = $data['num1'];
    $num2 = $data['num2'];

    if(!is_numeric($num1) || !is_numeric($num2)){
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
		exit();
    }

    $response['num1'] = $num1;
    $response['num2'] = $num2;
    $response['add'] = $num1 + $num2;
    $response['sub'] = $num1 - $num2;

    $response['success'] = true;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>