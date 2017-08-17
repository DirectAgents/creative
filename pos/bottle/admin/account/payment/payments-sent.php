<?php

session_start();
require_once '../../../base_path.php';

include("../../../config.php"); //include config file
require_once '../../../class.admin.php';
require_once '../../../class.customer.php';

require_once '../../../wepay.php';


$admin_home = new ADMIN();

if(!$admin_home->is_logged_in())
{
  $admin_home->redirect('../login');
}


$sqladmin=mysqli_query($connecDB,"SELECT * FROM tbl_admin WHERE userID = '".$_SESSION['adminSession']."'");
//$resultstartup=mysql_query($sqlstartup);
$rowadmin = mysqli_fetch_array($sqladmin);



$stmt = $admin_home->runQuery("SELECT * FROM wepay WHERE admin_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['adminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if($row['checkout_id'] != '') {  


?>





        
   <div class="col-lg-6">     

        <h2 class="no-mobile">
         Total amount paid
        </h2>
</div>






<div class="col-lg-12">  

 

<section data-group="payment" style="">
    
      <div class="note notforheader mobile-block">
        

<?php

$sql=mysqli_query($connecDB,"SELECT * FROM wepay WHERE startup_id = '".$_SESSION['startupSession']."' AND refunded = '' ORDER BY order_by DESC ");
//$row=mysql_fetch_array($result);

$sum = 0;

//get all records from add_delete_record table
while($row = mysqli_fetch_array($sql))
{ 

$sum+= $row['checkout_find_amount'] + $row['fees'] + $row['service_fee'];

}




?>

          <h2><?php echo "$"; echo $sum; ?></h2>
        
        
      </div>
    
<p>&nbsp;</p>

 <h3>Transactions</h3>




<?php

$sql2=mysqli_query($connecDB,"SELECT DISTINCT(checkout_find_date) FROM wepay WHERE startup_id = '".$_SESSION['startupSession']."' ORDER BY order_by DESC ");
//$row=mysql_fetch_array($result);

  //if username exists
if(mysqli_num_rows($sql2)>0)
{


//get all records from add_delete_record table
while($row = mysqli_fetch_array($sql2))
{ 



?>





    <div class="col-lg-12">
     



<table style="background:#eee">
    <tbody>
      <tr>
        <td style="text-align:center;"><?php echo $row['checkout_find_date']; ?></td>
      
      </tr>


  </tbody>
  </table>




  <table class="table table-striped" id="transactions">
    <tbody>
      <tr>
        <td style="text-align:left;">&nbsp;</td>
        <td style="text-align:left;">Date of Payment</td>
        <td style="text-align:left;">Participant Received</td>
        <td style="text-align:left;">Processing Fees</td>
         <td style="text-align:left;">Service Fee</td>
          <td style="text-align:left;">Total Pay</td>
        
        <td style="text-align:left;">&nbsp;</td>
      </tr>




<?php 
$sql3=mysqli_query($connecDB,"SELECT * FROM wepay WHERE checkout_find_date = '".$row['checkout_find_date']."' AND startup_id = '".$_SESSION['startupSession']."' ORDER BY id DESC ");
while($row2 = mysqli_fetch_array($sql3)){

$sql4=mysqli_query($connecDB,"SELECT * FROM tbl_participant WHERE userID = '".$row2['participant_id']."'");
$row3 = mysqli_fetch_array($sql4);




if (strpos($row2['checkout_find_amount'], '.') == false) {
    $final_amount =  $row2['checkout_find_amount'].'.00';
}else{
    $final_amount =  $row2['checkout_find_amount'];
}


?>


      <tr>
        <td style="text-align:left"><a href="<?php echo BASE_PATH; ?>/profile/participant/?id=<?php echo $row3['userID']; ?>"><?php echo $row3['FirstName'].' '.$row3['LastName']; ?></a></td>
        <td style="text-align:left"><?php echo date('F j, Y',strtotime($row2['Date'])); ?></td>
        <td style="text-align:left">$<?php echo $final_amount; ?></td>
        <td style="text-align:left">$<?php echo $row2['fees']; ?></td>
         <td style="text-align:left">$<?php echo $row2['service_fee']; ?></td>
          <td style="text-align:left">$<?php echo $row2['checkout_find_amount'] + $row2['fees'] + $row2['service_fee'] ; ?></td>
        
        <td style="text-align:left" valign="middle">

<?php if($row2['refundrequest'] != 'yes' && $row2['refunded'] != 'yes') { ?>
        <a href="request-refund?id=<?php echo $row2['id']; ?>" class="request-refund">Request Refund</a>
<?php } ?>

<?php if($row2['refundrequest'] == 'yes' && $row2['refunded'] == '') { ?>
       Refund Pending
<?php } ?>

<?php if($row2['refundrequest'] == '' && $row2['refunded'] == 'yes') { ?>
       Refunded
<?php } ?>
        </td>
       
      </tr>
    
  


<?php } ?>


  </tbody>
  </table>
</div>
      
  


  



  <?php } } ?>


<?php }else{ ?>
<h3>
You haven't sent any payments yet!
</h3>

<?php if($rowadmin['credit_card_id'] == '' && $rowadmin['account_id'] != '') { ?>
<p>Looks like you haven't set up a credit card to your account yet! Click on Credit Card to add a new card.</p>
 <?php } ?>

 <?php if($rowadmin['credit_card_id'] == '' && $rowadmin['account_id'] == '') { ?>
<p>Looks like you haven't set up an account yet to send money! Click on button below to create one.</p>
 <?php } ?>



<?php if($rowadmin['account_id'] == '') {  ?>

<div class="wepay_btn_box">  
  <div class="wepay_btn">

<a id="start_oauth2">Click here to create an Account to send money</a>
 
<script src="<?php echo $endpoint_url; ?>/min/js/wepay.v2.js" type="text/javascript"></script>
<script type="text/javascript">

WePay.set_endpoint("<?php echo $endpoint; ?>"); // stage or production

WePay.OAuth2.button_init(document.getElementById('start_oauth2'), {
    "client_id":"<?php echo $wepay_client_id; ?>",
     "scope":["manage_accounts","collect_payments","view_user","send_money","preapprove_payments"],
    //"user_name":"test user",
    //"user_email":"test@example.com",
    "redirect_uri":"<?php echo BASE_PATH; ?>/startup/payment/",
    "top":100, // control the positioning of the popup with the top and left params
    "left":100,
    "state":"robot", // this is an optional parameter that lets you persist some state value through the flow
    "callback":function(data) {
    /** This callback gets fired after the user clicks "grant access" in the popup and the popup closes. The data object will include the code which you can pass to your server to make the /oauth2/token call **/
        //alert(data.code);
    if (data.code.length !== 0) {
      // send the data to the server
      window.location.href = "<?php echo BASE_PATH; ?>/startup/account/wepay/oauth2/token/?client_id=<?php echo $wepay_client_id; ?>&code="+data.code+"&redirect_uri=<?php echo BASE_PATH; ?>/startup/account/wepay/&client_secret=<?php echo $wepay_client_secret; ?>&code="+data.code;

    } else {
      // an error has occurred and will be in data.error
    }
  }
});

</script>

</div>

</div>

<?php } ?>



 

  <?php } ?>







      
          




