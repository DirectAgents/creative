<?php

require('../init.php');


// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys

\Stripe\Stripe::setApiKey("sk_test_w7CCH5J5hRo3HwAIdyHpzQeB");

$customer = \Stripe\Customer::retrieve("cus_AzjA9CcqGrr4Nc");
//token
$customer->sources->create(array("source" => "btok_1AdjuMEY100NZJn9Bk0lQCKt"));


?>