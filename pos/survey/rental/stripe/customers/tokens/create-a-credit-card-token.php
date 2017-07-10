<?php

require('../../init.php');



\Stripe\Stripe::setApiKey("sk_test_w7CCH5J5hRo3HwAIdyHpzQeB");

$token = \Stripe\Token::create(array(
  "card" => array(
    "number" => "4242424242424242",
    "exp_month" => 7,
    "exp_year" => 2018,
    "cvc" => "314"
  )
));

echo $token -> id;


?>