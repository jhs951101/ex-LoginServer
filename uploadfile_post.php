<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

    $response = array();
    $response['success'] = false;

    $uploaddir = 'uploaded/';
    $fileNameExt = basename($_FILES['userfile']['name']);
    $uploadfile = $uploaddir . $fileNameExt;

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        $response['success'] = true;
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>
