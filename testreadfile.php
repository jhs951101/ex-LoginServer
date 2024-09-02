<?php
    $response = array();
    $response['success'] = false;

    $myReadedFile = null;
    $myFileToWrite = null;

    try{
        $filepath = 'uploaded/contract_document_basic.hml';

        if(!file_exists($filepath)){
            throw new Exception('hml not exist');
        }

        $myReadedFile = fopen($filepath, 'r');
        $contents = fread($myReadedFile,filesize($filepath));
        $contents = str_replace('&lt;buildgreen_contact_phone&gt;', '나가 뒈져라', $contents);

        $myFileToWrite = fopen('uploaded/test.hwp', 'w');
        fwrite($myFileToWrite, $contents);
        $response['success'] = true;
    }
    catch(Exception $e){
    }
    finally{
        if($myReadedFile != null){
            fclose($myReadedFile);
        }
        
        if($myFileToWrite != null){
            fclose($myFileToWrite);
        }
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>