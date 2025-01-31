<?php
    // 로그인 기능 (get 방식)
    // 결과 값은 무조건 json (성공, 실패, 상관 없이 무조건)
    
    include '../controller/database/MysqlController.php';
    $dbController = new MysqlController();

    $response = array();
    $response['success'] = false;

    $username = $_GET['username'];
    $password = $_GET['password'];

    /*
        username: 아이디
        password: 비밀번호
    */

    if(
        empty($username)
        || empty($password)
    ){
        // 필수 파라미터가 1개라도 빠졌을 경우
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
        // DB 처리 중 오류가 발생했을 경우 (아이디 부재, 비밀번호 불일치, SQL문 오류 등)
        $response['subErrorMsg'] = 'dbError';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }
    else if(count($results['results']) <= 0){
        // 존재하지 않는 아이디일 경우
        $response['subErrorMsg'] = 'noUser';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }
    else if(!password_verify($password, $results['results'][0]['password'])){
        // 비밀번호가 일치하지 않을 경우
        $response['subErrorMsg'] = 'incorrectPassword';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    // 해당 사용자의 이름을 불러옴
    $data = array();
    $data['name'] = $results['results'][0]['name'];

    $response['data'] = $data;
    $response['success'] = true;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>