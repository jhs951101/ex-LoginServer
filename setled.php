<?php
    include 'components/controller/database/MysqlController.php';

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

    $response = array();
    $response['success'] = false;

    $data = json_decode(file_get_contents('php://input'), true);
    $name = $data['name'];

    if(empty($name)){
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
		exit();
    }

    $mysqlController = new MysqlController();
    $query = 'TRUNCATE test_led';
    $results = $mysqlController->executeQuery($query);

    if(!$results['success']){
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
		exit();
    }

    $query = sprintf("INSERT INTO test_led VALUES ('%s')", $name);
    $results = $mysqlController->executeQuery($query);

	if(!$results['success']){
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
		exit();
    }

    $response['success'] = true;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>