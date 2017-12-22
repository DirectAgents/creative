<?php 
require 'vendor/autoload.php'; 

use net\authorize\api\contract\v1 as AnetAPI;
  use net\authorize\api\controller as AnetController;

$transaction =new AuthorizeNetAIM('6EpX83ba','9CkLG384m6N6fz84');
$transaction->amount ='20.99';
$transaction->card_num ='4111111111111111';
$transaction->exp_date ='12/38';
// add other details as needed

// Set the customer's Bill To address



    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName("Franz");
    $customerAddress->setLastName("Peter");
    $customerAddress->setCompany("Souveniropolis");
    $customerAddress->setAddress("14 Main Street");
    $customerAddress->setCity("Pecan Springs");
    $customerAddress->setState("TX");
    $customerAddress->setZip("44628");
    $customerAddress->setCountry("USA");

$response = $transaction->authorizeAndCapture();

if($response->approved){
  echo "<h1>Success! The test credit card has been charged!</h1>";
  echo "Transaction ID: ". $response->transaction_id;
}else{
  echo $response->error_message;
}


?>