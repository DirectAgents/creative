<?php

session_start();

require 'vendor/autoload.php';

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");


if($_POST) {




//echo $_POST['copies'];

//exit();


function chargeCreditCard($amount)
{

    $theamount = $_POST['copies'] * 25;



   
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCode\Constants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCode\Constants::MERCHANT_TRANSACTION_KEY);
    
    // Set the transaction's refId
    $refId = 'ref' . time();

    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($_POST['credit_number']);
    $creditCard->setExpirationDate($_POST['exp_yr']."-".$_POST['exp_month']);
    $creditCard->setCardCode($_POST['random']);

    // Add the payment data to a paymentType object
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    // Create order information
    $order = new AnetAPI\OrderType();
    $order->setInvoiceNumber($_POST['random']);
    $order->setDescription("Centennial Coffee Table Book");

    // Set the customer's Bill To address
    $customerAddress = new AnetAPI\CustomerAddressType();
    $customerAddress->setFirstName($_POST['firstname']);
    $customerAddress->setLastName($_POST['lastname']);
    $customerAddress->setCompany("Forbes");
    $customerAddress->setAddress($_POST['address'].' '.$_POST['address2']);
    $customerAddress->setCity($_POST['city']);
    $customerAddress->setState($_POST['state']);
    $customerAddress->setZip($_POST['zip']);
    $customerAddress->setCountry($_POST['country']);


    //Shipping Information
    $shipto = new AnetAPI\NameAndAddressType();
    $shipto->setFirstName($_POST['firstname']);
    $shipto->setLastName($_POST['lastname']);
    $shipto->setCompany("");
    $shipto->setAddress($_POST['address'].' '.$_POST['address2']);
    $shipto->setCity($_POST['city']);
    $shipto->setState($_POST['state']);
    $shipto->setZip($_POST['zip']);
    $shipto->setCountry($_POST['country']);

    // Set the customer's identifying information
    $customerData = new AnetAPI\CustomerDataType();
    $customerData->setType("individual");
    $customerData->setId('1123');
    $customerData->setEmail($_POST['email']);

    // Add values for transaction settings
    $duplicateWindowSetting = new AnetAPI\SettingType();
    $duplicateWindowSetting->setSettingName("duplicateWindow");
    $duplicateWindowSetting->setSettingValue("60");

    // Add some merchant defined fields. These fields won't be stored with the transaction,
    // but will be echoed back in the response.
    $merchantDefinedField1 = new AnetAPI\UserFieldType();
    $merchantDefinedField1->setName("customerLoyaltyNum");
    $merchantDefinedField1->setValue("1128836273");

    $merchantDefinedField2 = new AnetAPI\UserFieldType();
    $merchantDefinedField2->setName("favoriteColor");
    $merchantDefinedField2->setValue("blue");

    // Create a TransactionRequestType object and add the previous objects to it
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($theamount);
    $transactionRequestType->setOrder($order);
    $transactionRequestType->setPayment($paymentOne);
    $transactionRequestType->setBillTo($customerAddress);
    $transactionRequestType->setShipTo($shipto);
    $transactionRequestType->setCustomer($customerData);
    $transactionRequestType->addToTransactionSettings($duplicateWindowSetting);
    $transactionRequestType->addToUserFields($merchantDefinedField1);
    $transactionRequestType->addToUserFields($merchantDefinedField2);

    // Assemble the complete transaction request
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);

    // Create the controller and get the response
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    //$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
    

    if ($response != null) {
        // Check to see if the API request was successfully received and acted upon
        if ($response->getMessages()->getResultCode() == \SampleCode\Constants::RESPONSE_OK) {
            // Since the API request was successful, look for a transaction response
            // and parse it to display the results of authorizing the card
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getMessages() != null) {
                //echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
                //echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
                //echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
                //echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
                //echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";
              //if($_POST['random'] != $_SESSION['random']) {
                echo "<div style='float:left; width:100%; margin-bottom:20px; font-size:18px; color:#fff; font-weight:bold; font-family:Arial; padding:20px 0 20px 0; text-align:center; background:#3eb006'>";
                echo "Success!<br><br>";
                echo "Transaction ID: " . $tresponse->getTransId();
                echo "</div>";
               //}

            } else {
                //echo "Transaction Failed \n";
                if ($tresponse->getErrors() != null) {
                    //echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    //echo " Error Message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";

                    echo "<div style='float:left; width:100%; margin-top:20px; margin-bottom:20px; padding:20px 0 20px 0; font-size:18px; color:#fff; font-weight:bold; font-family:Arial; text-align:center; background:#ee140f'>";
                    echo $tresponse->getErrors()[0]->getErrorText() . "\n";
                    echo "</div>";
                }
            }
            // Or, print errors if the API request wasn't successful
        } else {
            //echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
        
            if ($tresponse != null && $tresponse->getErrors() != null) {
                //echo " Error Code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                if($_POST['random'] == $_SESSION['random']) {
                echo "<div style='float:left; margin-top:20px; margin-bottom:20px; width:100%; padding:20px 0 20px 0; font-size:18px; color:#fff; font-weight:bold; font-family:Arial; text-align:center; background:#ee140f'>";
                echo $tresponse->getErrors()[0]->getErrorText() . "\n";
                echo "</div>";
                }
            } else {
                //echo " Error Code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                //echo " Error Message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
              if($_POST['random'] == $_SESSION['random']) {
                echo "<div style='float:left; width:100%; margin-top:20px; margin-bottom:20px; padding:20px 0 20px 0; font-size:18px; color:#fff; font-weight:bold; font-family:Arial; text-align:center; background:#ee140f'>";
                echo $response->getMessages()->getMessage()[0]->getText() . "\n";
                echo "</div>";
              }
            }
        }
    } else {
        echo  "No response returned \n";
    }

    return $response;
}

if (!defined('DONT_RUN_SAMPLES')) {
    chargeCreditCard(\SampleCode\Constants::SAMPLE_AMOUNT);
}


}



?>