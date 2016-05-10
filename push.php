<?php

/*  
This file is used to send push notification to the registered devices.
The token for the registered devices will be present in the gcm_token.txt file.
the tokens from the file are populated to the gcm_token array and 
passed to the GCM server along with the API KEY which was obtained from the google console.
*/

$filename="gcm_token.txt"; // file that holds the gcm token

$gcm_tokens = file($filename, FILE_IGNORE_NEW_LINES); //used to populate the gcm tokens from the file to array

define( 'API_ACCESS_KEY', 'API_ACCESS_KEY_FROM_GOOGLE' ); // populate the API key from the google console

// Message paylod goes here
$message = array( 
"title" => "A good title @",
'message' => 'Hello World!',
"body" => "Yea its the push body!"	);

$fields = array
(
    'registration_ids'  => $gcm_tokens,
    'data'              => $message
);

$headers = array
(
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;

?>
