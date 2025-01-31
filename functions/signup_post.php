<?php
    // 회원가입 기능 (post & x-www-form-urlencoded 방식)
    // 결과 값은 무조건 json (성공, 실패, 상관 없이 무조건)
    
    include '../controller/database/MysqlController.php';
    $dbController = new MysqlController();

    $response = array();
    $response['success'] = false;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    /*
        username: 아이디
        password: 비밀번호
        name: 이름
    */

    if(
        empty($username)
        || empty($password)
        || empty($name)
    ){
        // 필수 파라미터가 1개라도 빠졌을 경우
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
        // DB 처리 중 오류가 발생했을 경우 (아이디 부재, 비밀번호 불일치, SQL문 오류 등)
        $response['subErrorMsg'] = 'dbError';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }
    
    $response['success'] = true;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>