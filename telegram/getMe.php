<?php
	require_once '../include/variables.php';
	$getMe = file_get_contents('https://api.telegram.org/bot'.$tokenTelegram.'/getMe');
	echo $getMe;
?>