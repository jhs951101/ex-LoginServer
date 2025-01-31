<?php
    include '../controller/database/MysqlController.php';
    $dbController = new MysqlController();

    $response = array();
    $response['success'] = false;

    $username = $_GET['username'];
    $password = $_GET['password'];
    $name = $_GET['name'];

    if(
        empty($username)
        || empty($password)
        || empty($name)
    ){
        $response['subErrorMsg'] = 'noEssentialParameters';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    $query = sprintf(
        "INSERT INTO
            test_user
        VALUES
            ('%s', '%s', '%s')",

        $username, password_hash($password, PASSWORD_BCRYPT), $name
    );

    $results = $dbController->executeQuery($query);

    if(!$results['success']){
        $response['subErrorMsg'] = 'dbError';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }
    
    $response['success'] = true;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>