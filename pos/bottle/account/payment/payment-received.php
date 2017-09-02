<?php

session_start();

require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.customer.php';



$customer_home = new CUSTOMER();

if(!$customer_home->is_logged_in())
{
  $customer_home->redirect('../../login');
}

$stmt = $customer_home->runQuery("SELECT * FROM tbl_customer WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['customerSession']));
$row_customer = $stmt->fetch(PDO::FETCH_ASSOC);



if($row_customer['account_id'] != '' && $row_customer['bank_account'] != '') {  


?>





<?php

  // WePay PHP SDK - http://git.io/mY7iQQ
    require '../../wepay.php';


 // application settings
    $account_id = $row_customer['account_id']; // your customer's account_id
    $client_id = $wepay_client_id;
    $client_secret = $wepay_client_secret;
    $access_token = $row_customer['access_token']; // your customer's access_token

    // change to useProduction for live environments
    Wepay::useStaging($client_id, $client_secret);

    $wepay = new WePay($access_token);

    // create the checkout
  

       try {
    $checkout = $wepay->request('/checkout/find', array(


        'account_id'        => $row_customer['account_id'],
        'sort_order' => 'DESC'
        //'start_time' => '2016/11/04',
        //'end_time' => '2016/11/06'
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

//print_r($checkout);

  ////////Total Amount////////

$presum = 0;
$sum = 0;
$final_sum = 0;


//$refund_amount_sum = 0;

 foreach ($checkout as $responsefinal) {
      
  $amount = $responsefinal->gross;

  $final_sum+= $amount;        


    }


   


}
    


?> 


        
      


        <h2 class="no-mobile">
         Total Balance
        </h2>

  <fieldset>

<section data-group="payment" style="">
    
      <div class="note notforheader mobile-block">
        
          <h2><?php echo "$"; echo $final_sum; ?></h2>
        
        
      </div>
    
<p>&nbsp;</p>

 <h3>Transactions</h3>




<?php

$sql=mysqli_query($connecDB,"SELECT DISTINCT(checkout_find_date) FROM wepay WHERE account_id = '".$row_customer['account_id']."' AND refunded = '' ORDER BY order_by DESC ");
//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql)>0)
{


//get all records from add_delete_record table
while($row = mysqli_fetch_array($sql))
{ 

  //echo $row['ProjectID'];


$sqlprojectwepay=mysqli_query($connecDB,"SELECT * FROM wepay WHERE account_id = '".$row_customer['account_id']."' AND checkout_find_date = '".$row['checkout_find_date']."' AND refunded = '' ORDER BY id DESC ");
$rowprojectwepay = mysqli_fetch_array($sqlprojectwepay);



$sqltask=mysqli_query($connecDB,"SELECT * FROM tbl_completed_tasks WHERE taskID = '".$rowprojectwepay['TaskID']."'");
$rowtask = mysqli_fetch_array($sqltask);


?>





    <div class="col-lg-12">


  <table class="table">
    <tbody>
     

      <tr class="info">
        <td style="text-align:left"><?php echo $row['checkout_find_date']; ?></td>
        <td style="text-align:right">&nbsp;</td>
        <td style="text-align:right">&nbsp;</td>
       
      </tr>
   </table>  



  <table class="table">
    <tbody>
     

       <tr>
        <td style="text-align:left" class="grey">PickUp#</td>
        <td style="text-align:left" class="grey">Transaction ID#</td>
        <td style="text-align:right" class="grey">Date of Payment</td>
        <td style="text-align:right" class="grey">Total Amount</td>
        <td style="text-align:right" class="grey">You Earned</td>
        <td style="text-align:right" class="grey">You Donated</td>
        <td style="text-align:right" class="grey">&nbsp;</td>
       
      </tr>




<?php 
$sql2=mysqli_query($connecDB,"SELECT * FROM wepay WHERE account_id = '".$row_customer['account_id']."' AND checkout_find_date = '".$row['checkout_find_date']."' AND refunded = '' ORDER BY id DESC ");

while($row2 = mysqli_fetch_array($sql2)){

  

$sql3=mysqli_query($connecDB,"SELECT * FROM tbl_admin WHERE userID = '".$row2['admin_id']."'");
$row3 = mysqli_fetch_array($sql3);


$sqlreceipt=mysqli_query($connecDB,"SELECT * FROM tbl_completed_tasks WHERE taskID = '".$row2['TaskID']."'");
$rowreceipt = mysqli_fetch_array($sqlreceipt);





if (strpos($row2['checkout_find_amount'], '.') == false) {
    $final_amount =  $row2['checkout_find_amount'].'.00';
}else{
    $final_amount =  $row2['checkout_find_amount'];
}


?>


      <tr>
        <td style="text-align:left"><?php echo $row2['TaskID']; //echo $row2['id']; ?></td>
        <td style="text-align:left"><?php echo $row2['checkout_id']; //echo $row2['id']; ?></td>
        <td style="text-align:right"><?php echo date('F j, Y',strtotime($row2['Date']));  ?></td>
        <td style="text-align:right">$<?php echo $final_amount; //echo $row2['id']; ?></td>
        <td style="text-align:right">$<?php echo $final_amount; //echo $row2['id']; ?></td>
        <td style="text-align:right">$<?php echo $row2['homeless_donation']; //echo $row2['id']; ?></td>
        <td style="text-align:right"><a target="_blank" href="<?php echo BASE_PATH; ?>/images/receipts/<?php echo $rowreceipt['Receipt'];?>">View Receipt</a></td>
       
      </tr>
    
  


<?php } ?>




  </tbody>
  </table>

    </div>
  


  



  <?php } }else{?>

<div class="no-account-yet">
<p>No Payments so far!</p>
</div>

    <?php } ?>


<?php }else{ ?>

<div class="no-account-yet">
<p><h3>You haven't set up a bank account yet to receive payments!</h3></p>

</div>






<div class="wepay_btn_box">  
  <div class="wepay_btn">

<h3>Add a Bank Account</h3>
<h4>Note.: You must be at least 18 years old and must have a tax ID (EIN or SSN)</h4>

<p>&nbsp;</p>
<a id="start_oauth2">Click here to create an Account to receive payments</a>
<p>&nbsp;</p>
<!--<h4>or</h4>
<p>&nbsp;</p>
<h4>Accept payments in <u>cash</u> if you don't qualify above </h4>
<h4>Note.: If you accept payments in cash we can't track your payment history</h4>
<p>&nbsp;</p>
<p><a href="#" id="pay-in-cash" class="wepay-widget-button">I want to accept payments in cash</a></p>-->

<input type="hidden" name="userid" value="<?php echo $_SESSION['customerSession']; ?>"/>

<div id="result"></div>

<script>
$(document).ready(function() {


$("#pay-in-cash").click(function (e) { //user clicks on button

e.preventDefault();

var proceed = true;


if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'userid'     : $('input[name=userid]').val()

            };


 //Ajax post data to server
            $.post('save-cash-only.php', post_data, function(response){  
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    //$("#result").slideUp();
                }
               $("#result").hide().html(output).slideDown();
            }, 'json');
        }
    });









});
    
   


</script>

<?php require '../../wepay.php'; ?>

<script type="text/javascript">

WePay.set_endpoint("<?php echo $endpoint; ?>"); // stage or production

WePay.OAuth2.button_init(document.getElementById('start_oauth2'), {
    "client_id":"<?php echo $wepay_client_id; ?>",
     "scope":["manage_accounts","collect_payments","view_user","send_money","preapprove_payments"],
    //"user_name":"test user",
    //"user_email":"test@example.com",
    "redirect_uri": "<?php echo BASE_PATH; ?>/account/payment/",
    "top":100, // control the positioning of the popup with the top and left params
    "left":100,
    "state":"robot", // this is an optional parameter that lets you persist some state value through the flow
    "callback":function(data) {
    /** This callback gets fired after the user clicks "grant access" in the popup and the popup closes. The data object will include the code which you can pass to your server to make the /oauth2/token call **/
        //alert(data.code);
    if (data.code.length !== 0) {
      // send the data to the server
      window.location.href = "<?php echo BASE_PATH; ?>/account/wepay/oauth2/token/?client_id=<?php echo $wepay_client_id; ?>&code="+data.code+"&redirect_uri=<?php echo BASE_PATH; ?>/account/wepay/&client_secret=<?php echo $wepay_client_secret; ?>&code="+data.code;

    } else {
      // an error has occurred and will be in data.error
    }
  }
});

</script>

</div>

</div>


  <?php }  ?>







      
          




