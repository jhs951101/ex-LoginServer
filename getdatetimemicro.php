<?php
    date_default_timezone_set('Asia/Seoul');

    $now = DateTime::createFromFormat('U.u', microtime(true));
	$createdDate = strval(date('Y-m-d H:i:s')) . strval($now->format(".u"));
    echo $createdDate . '<br><br>';
?>