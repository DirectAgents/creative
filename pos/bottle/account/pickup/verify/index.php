<?php


session_start();

require_once '../../../base_path.php';

include("../../../config.php"); //include config file
require_once '../../../class.participant.php';


$participant_home = new PARTICIPANT();

if(!$participant_home->is_logged_in())
{
  $participant_home->redirect('../../login');
}



$stmt = $participant_home->runQuery("SELECT * FROM tbl_participant WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['participantSession']));
$row_participant = $stmt->fetch(PDO::FETCH_ASSOC);


if($row_participant['Payment_Method'] == 'Bank' && $row_participant['bank_account'] == ''){


    // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../../wepay.php';


    // application settings
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row_participant['access_token'];

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create an account for a user
      try {
    $response = $wepay->request('account', array(

  


    'account_id' =>    $row_participant['account_id']

    
    


) );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}


if (isset($error)){
echo htmlspecialchars($error);
echo". Please refresh page and try again.";
exit();
    }else{
    // display the response
    print_r($response);
    $bankaccount = $response->balances[0]->withdrawal_bank_name;


  $update_sql = mysqli_query($connecDB,"UPDATE tbl_participant SET 

  bank_account = '".$bankaccount."'

  WHERE userID='".$_SESSION['participantSession']."'");

  header("Location:../");

}

    //header("Location:".$response -> uri."");
        //'address' => ['address1' => '100 Main Street','city'=>'New York','region'=>"CA",'country'=> "US",'postal_code'=> "94025"]*/

    //echo $response -> balances -> reserved_amount;

}else{
  
  header("Location:../");
}

?>