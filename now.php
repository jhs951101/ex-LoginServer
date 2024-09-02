<?php
	$now = DateTime::createFromFormat('U.u', microtime(true));
	$createdDate = strval($now->format("Y-m-d H:i:s.u"));
	$fileCreatedDate = strval($now->format("Ymd_Hisu"));

	echo $createdDate . '<br>';
	echo $fileCreatedDate . '<br>';
?>