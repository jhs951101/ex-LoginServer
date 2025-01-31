<?php
    $response = array();
    $response['success'] = false;

    if(empty($_FILES['userfile']['name'])){
        $response['subErrorMsg'] = 'noEssentialParameters';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    $folderPath = 'the_others/file/uploaded/';
    $fileNameExt = basename($_FILES['userfile']['name']);
    $filePath = $folderPath . $fileNameExt;

    if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $filePath)){
        $response['subErrorMsg'] = 'uploadFailed';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    $response['success'] = true;
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>
