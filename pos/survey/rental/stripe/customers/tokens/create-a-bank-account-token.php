<?php

require('../../init.php');


\Stripe\Stripe::setApiKey("sk_test_w7CCH5J5hRo3HwAIdyHpzQeB");

$token = \Stripe\Token::create(array(
  "bank_account" => array(
    "country" => "US",
    "currency" => "usd",
    "account_holder_name" => "Joseph Garcia",
    "account_holder_type" => "individual",
    "routing_number" => "110000000",
    "account_number" => "000123456789"
  )
));


echo $token -> id;


?>