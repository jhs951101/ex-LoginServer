<?php
    include '../controller/database/MysqlController.php';
    $dbController = new MysqlController();

    $response = array();
    $response['success'] = false;

    $username = $_GET['username'];
    $password = $_GET['password'];

    if(
        empty($username)
        || empty($password)
    ){
        $response['subErrorMsg'] = 'noEssentialParameters';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    $query = sprintf(
        "SELECT *
        FROM
            test_user
        WHERE
            username = '%s'",
        
        $username
    );
    
    $results = $dbController->executeQuery($query);

    if(!$results['success']){
        $response['subErrorMsg'] = 'dbError';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }
    else if(count($results['results']) <= 0){
        $response['subErrorMsg'] = 'noUser';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }
    else if(!password_verify($password, $results['results'][0]['password'])){
        $response['subErrorMsg'] = 'incorrectPassword';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    $data = array();
    $data['name'] = $results['results'][0]['name'];

    $response['data'] = $data;
    $response['success'] = true;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>