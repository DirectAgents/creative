<?php

session_start();
require_once '../../../../../base_path.php';

include("../../../../../config.php"); //include config file
require_once '../../../../../class.researcher.php';
require_once '../../../../../class.participant.php';


    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../../../wepay.php';




$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$researcher_home = new RESEARCHER();

if(!$researcher_home->is_logged_in())
{
  $researcher_home->redirect('../../../login');
}



$stmt = $researcher_home->runQuery("SELECT * FROM tbl_researcher WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['researcherSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



if($_GET){

    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
   try {
    $response = $wepay->request('credit_card/create', array(


    'client_id' =>    $wepay_client_id,
    //'access_token'    => $_GET["access_token"],
    'user_name'    => $_GET["user_name"],
    'email' => $_GET["email"],
    'cc_number'    => $_GET["cc_number"],
    'cvv'    => $_GET["cvv"],
    'expiration_month'    => $_GET["expiration_month"],
    'expiration_year'    => $_GET["expiration_year"],   
    'address' => ['address1' => $_GET["billing_address1"], 'address2' => $_GET["billing_address2"],'city'=>$_GET["billing_city"],'region'=>$_GET["billing_state"],'country'=>$_GET["billing_country"],'postal_code'=> $_GET["billing_zip"]]

    
    /*'client_id' =>    131244,
    'user_name'    => $_GET["user_name"],
    'email' => $_GET["email"],
    'cc_number'    => "5496198584584769",
    'cvv'    => "123",
    'expiration_month'    => 4,
    'expiration_year'    => 2020,   
    'address' => ['address1' => '100 Main Street','city'=>'New York','region'=>"CA",'country'=> "US",'postal_code'=> "94025"]*/


) );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}

    if (isset($error)){
    //echo htmlspecialchars($error);
    header("Location:http://localhost/survey/researcher/payment/?error=".htmlspecialchars($error)."#credit-card");
    }else{
    // display the response
    print_r($response);





 $update_sql = "UPDATE tbl_researcher SET 
  billing_address_one='".$_GET["billing_address1"]."',
  billing_address_two='".$_GET["billing_address2"]."',
  billing_city='".$_GET["billing_city"]."',
  billing_state='".$_GET["billing_state"]."',
  billing_country='".$_GET["billing_country"]."',
  billing_zip='".$_GET["billing_zip"]."',
  credit_card_id='".$response -> credit_card_id."'

  WHERE userID='".$_SESSION['researcherSession']."'";


   mysql_query($update_sql);

   header("Location:http://localhost/survey/researcher/payment/wepay/credit_card/authorize/?credit_card_id=".$response -> credit_card_id);

  }

}
    

?>