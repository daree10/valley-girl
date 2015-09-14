<?php
	require_once 'include/variables.php';
	$request_body = file_get_contents('php://input');
	
	$params = json_decode($request_body);
	$webhookURL = $params->{'url'};
	
	if( $curl = curl_init() ) 
	{
		curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot'.$tokenTelegram.'/setWebhook');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, "url=".$webhookURL);
		$out = curl_exec($curl);
		
		curl_close($curl);
		
		echo $out;
	}
?>