<?php

require('../../init.php');



\Stripe\Stripe::setApiKey("sk_test_w7CCH5J5hRo3HwAIdyHpzQeB");

$customer = \Stripe\Customer::retrieve("cus_AzjA9CcqGrr4Nc");
$customer->sources->create(array("source" => "tok_1AdkKZEY100NZJn9nF7v8BJi"));


?>