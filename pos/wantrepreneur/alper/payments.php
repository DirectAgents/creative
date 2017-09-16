<?php

session_start();

require_once '../base_path.php';



?>





<?php

  // WePay PHP SDK - http://git.io/mY7iQQ
    require '../wepay.php';


 // application settings
    $account_id = $wepay_account_id; // your participant's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $wepay_access_token; // your participant's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
  

       try {
    $checkout = $wepay->request('/checkout/find', array(


        'account_id'        => $wepay_account_id,
        'sort_order' => 'DESC'
        //'start_time' => '2017/05/25',
        //'end_time' => '2017/05/29'
        //'state' => 'new'
      )
    );
} catch (WePayException $e) { // if the API call returns an error, get the error message for display later
    $error = $e->getMessage();
}

if (isset($error)){
    echo htmlspecialchars($error);
    exit();
    //header("Location:http://localhost/creative/pos/survey/startup/payment/?error=".htmlspecialchars($error)."#credit-card");
    }else{

print_r($checkout);

  ////////Total Amount////////

$presum = 0;
$sum = 0;
//$refund_amount_sum = 0;

 foreach ($checkout as $responsefinal) {
        $gross     = $responsefinal->gross; 
        $net     = $responsefinal->gross - $responsefinal->fee->processing_fee; 
        $fee = $responsefinal->fee->processing_fee;
        
        //$presum+= $gross - $responsefinal->refund->amount_refunded;

        if($responsefinal->refund->amount_refunded != ''){
        $sum+= $gross - $responsefinal->refund->amount_refunded;
        }

        if($responsefinal->refund->amount_refunded == ''){
        $sum+= $net;
        }

        


        //$refund     = $responsefinal->refund->amount_refunded;
        //$refund_amount_sum+= $refund;

    }


   


}
    


?> 


        
      


          <h2><?php echo "$"; echo $sum; ?></h2>
        
   











      
          




