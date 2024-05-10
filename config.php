<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1039199768397-u99s60t7ssjic30i6n7ia00cm7t2so8c.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/PollEase/home.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>