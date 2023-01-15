<?php
    include 'components/controller/database/MysqlController.php';

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

    $mysqlController = new MysqlController();

    $query = 'SELECT * FROM test_led LIMIT 1';
    $results = $mysqlController->executeQuery($query);

    if($results['success']){
		if(count($results['results']) >= 1){
			$response['name'] = $results['results'][0]['name'];
		}
        else {
            $response['name'] = 'red';
        }
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>