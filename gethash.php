<?php
    $data = json_decode(file_get_contents('php://input'), JSON_UNESCAPED_UNICODE);
    $value = $data['value'];

    if(empty($value)){
		exit();
	}
    
    echo password_hash($value, PASSWORD_BCRYPT);
?>