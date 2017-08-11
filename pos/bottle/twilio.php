<?php
// Get the PHP helper library from twilio.com/docs/php/install
require_once 'twilio-php-master/Twilio/autoload.php'; // Loads the library
// Use the REST API Client to make requests to the Twilio REST API



use Twilio\Twiml;

$response = new Twiml();
$message = $response->message();
$message->body('Hello World!');
$response->redirect('https://demo.twilio.com/sms/welcome');

echo $response;


?>