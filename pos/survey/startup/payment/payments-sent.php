<?php

session_start();
require_once '../../base_path.php';

include("../../config.php"); //include config file
require_once '../../class.startup.php';
require_once '../../class.participant.php';


$participant_home = new PARTICIPANT();

if($participant_home->is_logged_in())
{
  $participant_home->logout();
}



$startup_home = new STARTUP();

if(!$startup_home->is_logged_in())
{
  $startup_home->redirect('../login');
}


$sqlstartup=mysqli_query($connecDB,"SELECT * FROM tbl_startup WHERE userID = '".$_SESSION['startupSession']."'");
//$resultstartup=mysql_query($sqlstartup);
$rowstartup = mysqli_fetch_array($sqlstartup);


$stmt = $startup_home->runQuery("SELECT * FROM wepay WHERE startup_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['startupSession']));
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

$sql="SELECT * FROM wepay WHERE startup_id = '".$_SESSION['startupSession']."' AND refunded = '' ORDER BY order_by DESC ";
$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

$sum = 0;

//get all records from add_delete_record table
while($row = mysql_fetch_array($result))
{ 

$sum+= $row['checkout_find_amount'];

}




?>

          <h2><?php echo "$"; echo $sum; ?></h2>
        
        
      </div>
    
<p>&nbsp;</p>

 <h3>Transactions</h3>




<?php

$sql="SELECT DISTINCT(checkout_find_date) FROM wepay WHERE startup_id = '".$_SESSION['startupSession']."' ORDER BY order_by DESC ";
$result=mysql_query($sql);
//$row=mysql_fetch_array($result);

  //if username exists
if(mysql_num_rows($result)>0)
{


//get all records from add_delete_record table
while($row = mysql_fetch_array($result))
{ 



?>




 <div class="therow">
    <div class="col-lg-12">
     



  <table class="table table-striped" id="transactions">
    <tbody>
      <tr class="info">
        <td colspan="3" style="text-align:left"><?php echo $row['checkout_find_date']; ?></td>
        
      </tr>




<?php 
$sql="SELECT * FROM wepay WHERE checkout_find_date = '".$row['checkout_find_date']."' ORDER BY id DESC ";
$result2=mysql_query($sql);
while($row2 = mysql_fetch_array($result2)){

$sql3="SELECT * FROM tbl_participant WHERE userID = '".$row2['participant_id']."'";
$result3=mysql_query($sql3);
$row3 = mysql_fetch_array($result3);





?>


      <tr>
        <td style="text-align:left"><?php echo $row3['FirstName'].' '.$row3['LastName']; ?></td>
        <td style="text-align:right">$<?php echo $row2['total']; ?></td>
        <td style="text-align:right">

<?php if($row2['refundrequest'] != 'yes' && $row2['refunded'] != 'yes') { ?>
        <a href="request-refund?id=<?php echo $row2['id']; ?>">Request Refund</a>
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
      
    </div>
  


  



  <?php } } ?>


<?php }else{ ?>
<h3>
You haven't sent any payments yet!
</h3>

<?php if($rowstartup['credit_card_id'] == '') { ?>
<p>Looks like you haven't set up a credit card to your account yet! Click on Credit Card to add a new card.</p>
 <?php } ?>

  <?php } ?>







      
          




