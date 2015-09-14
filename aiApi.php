<?php
	require_once 'include/variables.php';
	$request_body = file_get_contents('php://input');
	
	$params = json_decode($request_body);
	$userMessage = $params->{'msg'};
	$message = array(
		'message' => array(
			'message' => $userMessage,
			'chatBotID' => $chatBotID,
			'timestamp' => time()
		),
	'user' => array(
		'firstName' => '',
		'lastName' => '',
		'gender' => '',
		'externalID' => 'a' 
		)
	);
	
	$msgJSON = json_encode($message);
	
	$hash = hash_hmac('sha256', $msgJSON, $apiSecret);
	
	$url = "http://www.personalityforge.com/api/chat/?apiKey=".$apiKey."&hash=".$hash."&message=".urlencode($msgJSON);
	echo file_get_contents($url);
?>