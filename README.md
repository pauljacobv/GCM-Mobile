*gcm_register.php*<br /><br />
This file is used to get the GCM tokens from the device,<br />
The tokens can be passed via an ajax POST form parameter in the body, with key as 'token' and value as 'GCM Token'.<br />
The fetched tokens are saved to the gcm_token.txt file.<br />
all the tokens for the registered device will be present in this file.<br />

*push.php*<br />

This file is used to send push notification to the registered devices.<br />
The token for the registered devices will be present in the gcm_token.txt file.<br />
the tokens from the file are populated to the gcm_token array and <br />
passed to the GCM server along with the API KEY which was obtained from the Google console.<br />
