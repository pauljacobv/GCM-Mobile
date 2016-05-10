<?php
 
/* 
This file is used to get the GCM tokens from the device,
the tokens are fetched via php POST method
and the fetched tokens are saved to the gcm_token.txt file.
all the tokens for the registered device will be present in this file.
*/
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');  
$gcm_token="";
$token_file="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gcm_token = $_POST["token"];
    $gcm_token=$gcm_token."\r\n";
	$token_file = fopen("gcm_token.txt", "a+") or die("Unable to open file!");
	fwrite($token_file, $gcm_token);
	echo json_encode(array('Token' => 'Posted', 'Response' => 'OK'));
}
fclose($token_file);
?>