<?php
    // 파일 업로드 기능
    // 결과 값은 무조건 json (성공, 실패, 상관 없이 무조건)
    
    $response = array();
    $response['success'] = false;

    if(empty($_FILES['userfile']['name'])){
        // 필수 파라미터가 1개라도 빠졌을 경우 (파일 자체가 없을 경우)
        $response['subErrorMsg'] = 'noEssentialParameters';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    $folderPath = 'the_others/file/uploaded/';
    $fileNameExt = basename($_FILES['userfile']['name']);
    $filePath = $folderPath . $fileNameExt;

    if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $filePath)){
        // 서버로 파일 올리는 것에 실패했을 경우
        $response['subErrorMsg'] = 'uploadFailed';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    $response['success'] = true;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>
