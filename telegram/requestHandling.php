<?php
	$request_body = file_get_contents('php://input');
	mail("ovenocisedisama@outlook.com", "novi zahtjev", $request_body);
?>