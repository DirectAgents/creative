<?php

require('../init.php');


// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_w7CCH5J5hRo3HwAIdyHpzQeB");


echo \Stripe\Customer::create(array(
  "description" => "Customer for franztest@test.com",
  "email" => "franztest@test.com"
));
?>